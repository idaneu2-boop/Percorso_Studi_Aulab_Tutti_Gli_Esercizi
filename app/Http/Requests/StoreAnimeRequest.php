<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreAnimeRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:100'],
            'genre' => ['required', 'string', 'max:120'],
            'synopsis' => ['required', 'string', 'min:10', 'max:1200'],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'title.required' => 'Inserisci il titolo dell anime.',
            'genre.required' => 'Inserisci almeno un genere.',
            'synopsis.required' => 'Inserisci una sinossi.',
            'synopsis.min' => 'La sinossi deve contenere almeno 10 caratteri.',
        ];
    }
}
