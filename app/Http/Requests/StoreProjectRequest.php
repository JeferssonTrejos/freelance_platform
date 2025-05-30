<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'budget' => 'required|numeric|min:0',
            'expected_timeline' => 'required|string',
            'specific_deliverables' => 'nullable|array',
            'specific_deliverables.*' => 'nullable|string',
            'evaluation_criteria' => 'required|array',
            'evaluation_criteria.*' => 'string',
            'required_skills' => 'required|array',
            'required_skills.*' => 'string',
            'project_proposals' => 'nullable|array',
            'project_proposals.*.id' => 'nullable|string',
        ];
    }
}
