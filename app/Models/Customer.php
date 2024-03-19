<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        //lo rellenaremos luego
        'name',
        'type',
        'email',
        'address',
        'city',
        'state',
        'postal_code'
    ];
   //relacion has many (un clkiente puede tener muchas facturas)
   public function invoices () {
    return $this->hasMany(Invoice::class);
   }
 
}
