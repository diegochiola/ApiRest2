<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rule; //importar validation rule

class StoreCustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        //quien tiene los permisos
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //reglas de validacion para poder dar de alta cliente
            'name' => ['required'],
            'type' => ['required', Rule::in(['I','B','i','b'])],
            'email' => ['required', 'email'],
            'address' => ['required'],
            'city' => ['required'],
            'state' => ['required'],
            'postalCode' => ['required'], //para que postal code no de error se crea la funcion de abajo
        ];
    }
    protected function prepareForValidation(){
        $this->merge([
            'postal_code'=> $this->postalCode
        ]);
    }
}
