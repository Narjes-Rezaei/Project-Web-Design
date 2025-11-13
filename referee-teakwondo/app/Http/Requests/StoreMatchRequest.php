<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMatchRequest extends FormRequest
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
            'event_title' => 'required|string|max:255',
            'event_date' => 'required|date',
            'event_rank' => 'required|exists:event_ranks,id',
            'event_type' => 'required|exists:event_types,id',
            'province' => 'required|exists:provinces,id',
        ];
    }
}
