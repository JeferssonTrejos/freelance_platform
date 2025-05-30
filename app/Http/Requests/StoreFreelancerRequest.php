<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFreelancerRequest extends FormRequest
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
    public function rules()
    {
        return [
            'name' => 'required|string|max:100',
            'portfolio' => 'array',
            'portfolio.*.title' => 'required|string|max:255',
            'portfolio.*.description' => 'string',
            'portfolio.*.url' => 'nullable|string',
            'experience' => 'array',
            'experience.*.position' => 'required|string|max:100',
            'experience.*.company' => 'required|string|max:100',
            'experience.*.years' => 'required|integer|min:0',
            'education' => 'array',
            'education.*.degree' => 'required|string|max:100',
            'education.*.university' => 'required|string|max:100',
            'certifications' => 'array',
            'certifications.*' => 'string|max:150',
            'languages' => 'array',
            'languages.*' => 'string|max:50',
            'availability' => 'required|in:full-time,part-time,unavailable',
            'rates' => 'array',
            'rates.*.service_id' => 'required|exists:services,id',
            'rates.*.amount' => 'required|numeric|min:0',
        ];
    }
}



