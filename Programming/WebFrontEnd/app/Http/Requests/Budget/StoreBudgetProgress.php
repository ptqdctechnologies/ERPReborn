<?php

namespace App\Http\Requests\Budget;

use Illuminate\Foundation\Http\FormRequest;

class StoreBudgetProgress extends FormRequest
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
            'budget_progress_date_range' => 'required|string',
            'additionalData' => 'required|array',
            'additionalData.*.entities.progressCompletion' => 'nullable|numeric',
        ];
    }

    public function withValidator($validator): void
    {
        $validator->after(function ($validator) {
            $additionalData = $this->input('additionalData', []);

            $hasProgressCompletion = collect($additionalData)
                ->contains(
                    fn($item) =>
                        filled(data_get($item, 'entities.progressCompletion'))
                );

            if (!$hasProgressCompletion) {
                $validator->errors()->add(
                    'additionalData',
                    'At least one line must be filled in..'
                );
            }
        });
    }

    public function messages(): array
    {
        return [
            'budget_id.required' => 'The budget code field is required.',
            'budget_progress_date_range.required' => 'The date range field is required.',
            'additionalData.required' => 'The budget details field is required.',
        ];
    }
}
