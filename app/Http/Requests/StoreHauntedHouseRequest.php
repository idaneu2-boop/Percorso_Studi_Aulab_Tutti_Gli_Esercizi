<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreHauntedHouseRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:120'],
            'location' => ['required', 'string', 'max:160'],
            'price_per_night' => ['required', 'numeric', 'min:1', 'max:99999.99'],
        ];
    }

    protected function prepareForValidation(): void
    {
        if ($this->has('price_per_night')) {
            $this->merge([
                'price_per_night' => str_replace(',', '.', (string) $this->input('price_per_night')),
            ]);
        }
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Inserisci il nome della casa infestata.',
            'location.required' => 'Inserisci la localita della casa infestata.',
            'price_per_night.required' => 'Inserisci il prezzo del soggiorno.',
            'price_per_night.numeric' => 'Il prezzo deve essere un numero valido.',
            'price_per_night.min' => 'Il prezzo deve essere maggiore di zero.',
        ];
    }
}
