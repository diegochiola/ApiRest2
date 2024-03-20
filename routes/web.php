<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/setup', function(){ //intentar crear usuario con las credenciales
    $credentials =[
    'email' => "admin@admin.com",
    'password' => 'password'
    ];
    if (!Auth::attempt($credentials)){ //en caso de que el usuario no exista, se desarrolla esta logica
        $user = new \App\Models\User();
        $user->name = 'Admin';
        $user->email = $credentials ['email'];
        $user->password = Hash::make($credentials['password']); //has passwrod es para tenerlo haseado
        $user->save();
    }
    if(Auth::attempt($credentials)){ //ahora con el usuario creado anteriormente, volvemos a intentarlo
        $user = Auth::user();
        $adminToken = $user->createToken('admin-token', ['create', 'update','delete']);//creacion de tokens
        $updateToken = $user->createToken('update-token', ['create', 'update']);
        $basicToken = $user->createToken('basic-token');
        return[
            'admin' => $adminToken->plainTextToken,
            'update' => $updateToken->plainTextToken,
            'basic' => $basicToken->plainTextToken,
        ];


    }
});
