<?php

namespace App\Http\Requests\Finance\Invoice;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class StoreInvoice extends FormRequest
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
            'invoiceDetails' => ['nullable', 'array'],

            'invoiceDetails.*.entities.combinedBudgetSectionDetail_RefID' => [
                'nullable',
                // 'integer',
                'required_with:invoiceDetails.*.entities.value,invoiceDetails.*.entities.progress',
            ],

            'invoiceDetails.*.entities.value' => [
                'nullable',
                // 'numeric',
                'required_with:invoiceDetails.*.entities.progress',
            ],

            'invoiceDetails.*.entities.progress' => [
                'nullable',
                // 'numeric',
                'required_with:invoiceDetails.*.entities.value',
            ],
        ];
    }

    /**
     * Custom validation after standard rules.
     * Function to Check Minimum One Line Fill
     */
    public function withValidator($validator): void
    {
        $validator->after(function (Validator $validator) {

            $invoiceDetails = $this->input('invoiceDetails', []);

            $hasFilledRow = collect($invoiceDetails)
                ->contains(function ($item) {

                    $entities = $item['entities'] ?? [];

                    return filled($entities['combinedBudgetSectionDetail_RefID'] ?? null)
                        && filled($entities['value'] ?? null)
                        && filled($entities['progress'] ?? null);
                });

            if (!$hasFilledRow) {
                $validator->errors()->add(
                    'invoiceDetails',
                    'Please complete at least one invoice line.'
                );
            }
        });
    }

    /**
     * Function to Remove Commas
     */
    // protected function prepareForValidation(): void
    // {
    //     $invoiceDetails = collect($this->input('invoiceDetails', []))
    //         ->map(function ($item) {

    //             $entities = $item['entities'] ?? [];

    //             return [
    //                 'entities' => [
    //                     'combinedBudgetSectionDetail_RefID' => $entities['combinedBudgetSectionDetail_RefID'] ?? null,
    //                     'value' => isset($entities['value'])
    //                         ? str_replace(',', '', $entities['value'])
    //                         : null,
    //                     'progress' => $entities['progress'] ?? null,
    //                 ]
    //             ];
    //         })
    //         ->filter(function ($item) {

    //             $entities = $item['entities'];

    //             return filled($entities['combinedBudgetSectionDetail_RefID'])
    //                 && filled($entities['value'])
    //                 && filled($entities['progress']);
    //         })
    //         ->values()
    //         ->toArray();

    //     $this->merge([
    //         'invoiceDetails' => $invoiceDetails,
    //     ]);
    // }

    /**
     * Custom validation messages.
     */
    public function messages(): array
    {
        return [
            // 'invoiceDetails.*.entities.combinedBudgetSectionDetail_RefID.required_with'
            // => 'Budget Detail wajib ada jika Value atau Progress diisi.',

            'invoiceDetails.*.entities.value.required_with'
            => 'Please enter a Invoice Value if Progress is provided.',

            // 'invoiceDetails.*.entities.value.numeric'
            // => 'Value harus berupa angka.',

            'invoiceDetails.*.entities.progress.required_with'
            => 'Please enter Progress if Invoice Value is provided.',

            // 'invoiceDetails.*.entities.progress.numeric'
            // => 'Progress harus berupa angka.',
        ];
    }
}
