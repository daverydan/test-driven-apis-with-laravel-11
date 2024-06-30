<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DepartmentRequest extends FormRequest
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
            'name' => [
                request()->isMethod('post') ? 'required' : 'sometimes',
                'string',
                Rule::unique('departments', 'name')->ignore($this->department),
            ],

            'description' => [
                'nullable',
                'sometimes',
                'string',
            ],
        ];
    }
}
