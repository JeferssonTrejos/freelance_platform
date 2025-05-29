<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFreelancerRequest extends FormRequest
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
            'name' => 'string|max:100',
            'portfolio' => 'array',
            'portfolio.*.title' => 'string|max:255',
            'portfolio.*.description' => 'string',
            'portfolio.*.url' => 'nullable|string',
            'experience' => 'array',
            'experience.*.position' => 'string|max:100',
            'experience.*.company' => 'string|max:100',
            'experience.*.years' => 'integer|min:0',
            'education' => 'array',
            'education.*.degree' => 'string|max:100',
            'education.*.university' => 'string|max:100',
            'certifications' => 'array',
            'certifications.*' => 'string|max:150',
            'languages' => 'array',
            'languages.*' => 'string|max:50',
            'availability' => 'in:full-time,part-time,unavailable',
            'rates' => 'array',
            'rates.*.type' => 'string',
            'rates.*.amount' => 'numeric|min:0',
            'skill_ids' => 'array',
            'skill_ids.*' => 'exists:skills,_id',
        ];
    }
}
