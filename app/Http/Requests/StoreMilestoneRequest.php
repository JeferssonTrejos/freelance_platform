<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMilestoneRequest extends FormRequest
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
            'proposal_id' => 'required|string|exists:project_proposals,_id',
            'title' => 'required|string|max:255',
            'due_date' => 'required|date',
            'deliverables' => 'nullable|array',
            'status' => 'nullable|string|in:pending,in_progress,completed,cancelled',
            'payment_id' => 'nullable|string|exists:payments,_id',
        ];
    }
}
