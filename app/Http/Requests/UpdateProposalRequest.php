<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProposalRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // Todos los campos son opcionales en update (sometimes)
            'approach' => 'sometimes|string|min:50|max:5000',
            'timeline_details' => 'sometimes|string|min:10|max:500',
            
            // Budget breakdown
            'budget_breakdown' => 'sometimes|array',
            'budget_breakdown.development' => 'sometimes|numeric|min:0',
            'budget_breakdown.design' => 'sometimes|numeric|min:0',
            'budget_breakdown.testing' => 'sometimes|numeric|min:0',
            'budget_breakdown.total' => 'required_with:budget_breakdown|numeric|min:1',
            
            // Examples
            'examples' => 'sometimes|array|max:10',
            'examples.*.title' => 'required_with:examples|string|max:100',
            'examples.*.url' => 'required_with:examples|url|max:255',
            'examples.*.description' => 'sometimes|string|max:500',
            
            // Terms
            'terms' => 'sometimes|array',
            'terms.payment_schedule' => 'required_with:terms|string|max:500',
            'terms.delivery_time' => 'required_with:terms|string|max:100',
            'terms.revisions' => 'sometimes|string|max:200',
            'terms.support' => 'sometimes|string|max:200',
            
            'status' => 'sometimes|in:pending,accepted,rejected'
        ];
    }
}
