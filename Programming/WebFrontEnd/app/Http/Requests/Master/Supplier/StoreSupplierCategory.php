<?php

namespace App\Http\Requests\Master\Supplier;

use Illuminate\Foundation\Http\FormRequest;

class StoreSupplierCategory extends FormRequest
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
            'supplier_category_code' => 'required|string',
            'supplier_category_name' => 'required|string'
        ];
    }
}
