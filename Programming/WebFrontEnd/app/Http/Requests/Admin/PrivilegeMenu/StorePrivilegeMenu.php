<?php

namespace App\Http\Requests\Admin\PrivilegeMenu;

use Illuminate\Foundation\Http\FormRequest;

class StorePrivilegeMenu extends FormRequest
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
            'department_id' => 'required',
            'role_id' => 'required',
            'modul' => 'required',
            'menu_type' => 'required',
            'list_menu' => 'required|array'
        ];
    }

    public function messages(): array
    {
        return [
            'department_id.required' => 'The department field is required.',
            'role_id.required' => 'The role field is required.',
        ];
    }
}
