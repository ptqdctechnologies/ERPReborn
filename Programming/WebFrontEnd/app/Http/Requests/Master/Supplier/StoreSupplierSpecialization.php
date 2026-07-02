<?php

namespace App\Http\Requests\Master\Supplier;

use Illuminate\Foundation\Http\FormRequest;

class StoreSupplierSpecialization extends FormRequest
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

    protected function prepareForValidation(): void
    {
        $this->merge([
            'specialization' => json_decode($this->specialization, true),
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'supplier_category_name_modal' => ['required', 'string'],
            'specialization' => [
                'required',
                'array',
                function ($attribute, $value, $fail) {

                    // Minimal ada 1 object yang lengkap
                    $validCount = 0;

                    foreach ($value as $index => $item) {

                        $code = trim($item['code'] ?? '');
                        $name = trim($item['name'] ?? '');

                        // Jika salah satu diisi maka keduanya wajib
                        if (($code && !$name) || (!$code && $name)) {
                            $fail("Please fill in both Code and Name for specialization #" . ($index + 1) . ".");
                            return;
                        }

                        // Object lengkap
                        if ($code && $name) {
                            $validCount++;
                        }
                    }

                    if ($validCount === 0) {
                        $fail('At least one specialization must have both Code and Name filled in.');
                    }
                }
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'supplier_category_name_modal.required' => 'The category field is required.',
            'specialization.required' => 'The sub category field is required.',
            // 'specialization.array' => 'Format specialization tidak valid.',
        ];
    }
}
