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
            'proposal_id' => 'required|string',
            'title' => 'required|string|max:255',
            'due_date' => 'required|string',
            'deliverables' => 'nullable|array',
            'status' => 'nullable|string|in:pending,in_progress,completed,cancelled'
        ];
    }
}
