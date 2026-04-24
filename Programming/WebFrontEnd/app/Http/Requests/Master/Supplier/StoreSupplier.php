<?php

namespace App\Http\Requests\Master\Supplier;

use Illuminate\Foundation\Http\FormRequest;

class StoreSupplier extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Set to true if anyone can do this, 
        // or add logic to check if user owns the resource.
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'supplier_name' => 'required|string',
            'tax_id' => 'nullable|string',
            'phone_number' => 'required',
            'email' => 'required|email',
            'country_name' => 'required|string',
            'province_name' => 'required|string',
            'city_name' => 'required|string',
            'address' => 'required|string',
            'contact_person' => 'required|string',
            'bank_id' => 'required',
            'account_number' => 'required|string',
            'account_name' => 'required|string',
            // 'remark' => 'required|string',
            'legal_entity_value' => 'required|string',
            'category' => 'required|array',
            'specialization' => 'required|array'
        ];
    }
}
