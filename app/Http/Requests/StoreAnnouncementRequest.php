<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;

class StoreAnnouncementRequest extends FormRequest
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
            'reporter_name' => ['required', 'string', 'min:2', 'max:80'],
            'reporter_email' => ['required', 'email', 'max:120'],
            'title' => ['required', 'string', 'min:8', 'max:120'],
            'category' => ['required', 'string', 'in:Gameplay,Mappa,Veicoli,Personaggi,Online'],
            'location' => ['nullable', 'string', 'max:80'],
            'credibility' => ['required', 'integer', 'between:1,5'],
            'is_spoiler' => ['nullable', 'boolean'],
            'body' => ['required', 'string', 'min:40', 'max:2500'],
            'image' => ['nullable', File::image()->types(['jpg', 'jpeg', 'png', 'webp'])->max('4mb')],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'body.min' => 'Racconta il leak con qualche dettaglio in piu.',
            'category.in' => 'Scegli una categoria valida per la board.',
            'credibility.between' => 'Il livello di affidabilita deve essere tra 1 e 5.',
            'image.image' => 'Carica un file immagine valido.',
        ];
    }
}
