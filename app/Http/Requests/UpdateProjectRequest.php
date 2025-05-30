<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
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
            'client_id' => 'required|string',
            'title' => 'string|max:255',
            'description' => 'string',
            'budget' => 'numeric|min:0',
            'expected_timeline' => 'string',
            'specific_deliverables' => 'array',
            'specific_deliverables.*.deliverable' => 'string',
            'evaluation_criteria' => 'array',
            'evaluation_criteria.*.criteria' => 'string',
            'required_skills' => 'array',
            'required_skills.*.skill' => 'string',
            'project_proposals' => 'nullable|array',
            'project_proposals.*.id' => 'nullable|string',
        ];
    }
}
