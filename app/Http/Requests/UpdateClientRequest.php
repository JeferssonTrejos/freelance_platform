<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateClientRequest extends FormRequest
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

       $clientId = $this->route('client')?->_id;

        return [
            'name' => [
                'required',
                'string',
                'max:100'
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('mongodb.clients', 'email')->ignore($clientId, '_id')
            ],
            'company' => [
                'nullable',
                'string',
                'max:150'
            ],
            'phone' => [
                'nullable',
                'string',
                'max:20'
            ],
            'address' => [
                'nullable',
                'string',
                'max:255'
            ]
        ];
    }
}
