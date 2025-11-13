<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMemberRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'family' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|unique:referees',
            'gender' => 'required|exists:genders,id',
            'province' => 'required|exists:provinces,id',
            'image' => 'nullable|image|max:2048',
            'birth_date' => 'required|date',

        ];
    }
}
