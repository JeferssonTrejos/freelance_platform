<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreReviewRequest extends FormRequest
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
            'project_id' => [
                'required',
                'string',
                'exists:projects,id'
            ],
            'reviewer_id' => [
                'required',
                'string'
            ],
            'reviewer_type' => [
                'required',
                'string',
                Rule::in(['Client', 'Freelancer'])
            ],
            'reviewed_id' => [
                'required',
                'string'
            ],
            'reviewed_type' => [
                'required',
                'string',
                Rule::in(['Client', 'Freelancer'])
            ],
            'rating' => [
                'required',
                'integer',
                'min:1',
                'max:5'
            ],
            'comments' => [
                'nullable',
                'string',
                'max:1000'
            ]
        ];
    }
}
