<?php

namespace App\Http\Requests\Process;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdvanceRequest extends FormRequest
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
            'budget_id' => 'required|string',
            'sub_budget_id' => 'required|string',
            'requester_id' => 'required|string',
            'beneficiary_id' => 'required|string',
            'bank_id' => 'required|string',
            'account_number_id' => 'required|string',
            'remark' => 'required|string',
            'additionalData' => 'required|array',
            'additionalData.*.productUnitPriceCurrencyValue' => 'nullable',
            'additionalData.*.quantity' => 'nullable'
        ];
    }

    public function withValidator($validator): void
    {
        $validator->after(function ($validator) {
            $additionalData = $this->input('additionalData', []);

            $hasFilledLine = collect($additionalData)->contains(
                fn($item) =>
                    filled(data_get($item, 'productUnitPriceCurrencyValue')) &&
                    filled(data_get($item, 'quantity'))
            );

            if (!$hasFilledLine) {
                $validator->errors()->add(
                    'additionalData',
                    'At least one line must have price and quantity filled in.'
                );
            }
        });
    }

    public function messages(): array
    {
        return [
            'budget_id.required' => 'The budget code field is required.',
            'sub_budget_id.required' => 'The sub budget code field is required.',
            'requester_id.required' => 'The requester field is required.',
            'beneficiary_id.required' => 'The beneficiary field is required.',
            'bank_id.required' => 'The bank field is required.',
            'account_number_id.required' => 'The account number field is required.',
            'remark.required' => 'The remark field is required.',
            'additionalData.required' => 'The budget details field is required.',
        ];
    }
}
