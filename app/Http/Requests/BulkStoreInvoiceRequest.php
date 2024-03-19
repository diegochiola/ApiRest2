<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class BulkStoreInvoiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
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
            //array de invoices lleva *.
            '*.customerId' => ['required'],
            '*.amount' => ['required','numeric'],
            '*.status' => ['required',Rule::in(['B','P','V', 'b','p','v'])],
            '*.billedDated' => ['required', 'date_format:Y-m-d H:i:s'],
            '*.paidDated' => ['date_format:Y-m-d H:i:s', 'nullable'],
        ];
    }
}
