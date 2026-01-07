<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRefereeRequest extends FormRequest
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
            // 'name' => 'required|string|max:255',
            // 'family' => 'required|string|max:255',
            // 'birth_year' => 'required|integer|min:1900|max:2025',
            // 'national_code' => 'nullable|string|max:10',
            // 'phone' => 'required|string|max:15',
            // 'email' => 'required|email|unique:referees',
            // 'password' => 'required|min:6',
            // 'gender' => 'required|exists:genders,id',
            // 'degree' => 'required|exists:degrees,id',
            // 'province' => 'required|exists:provinces,id',
            // 'image' => 'nullable|image|max:2048'
        ];
    }
}
