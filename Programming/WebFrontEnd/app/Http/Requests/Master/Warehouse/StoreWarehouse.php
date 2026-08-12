<?php

namespace App\Http\Requests\Master\Warehouse;

use Illuminate\Foundation\Http\FormRequest;

class StoreWarehouse extends FormRequest
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
            'warehouse_code' => 'required|max:10',
            'warehouse_name' => 'required',
            'country_name' => 'required',
            'province_name' => 'required',
            'city_name' => 'required',
            'warehouse_type' => 'required',
            'warehouse_address' => 'required'
        ];
    }
}
