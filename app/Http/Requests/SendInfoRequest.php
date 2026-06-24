<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class SendInfoRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:2', 'max:80'],
            'email' => ['required', 'email', 'max:120'],
            'topic' => ['required', 'string', 'in:Press kit,Collaborazioni,Gameplay reveal,Eventi,Altro'],
            'message' => ['required', 'string', 'min:20', 'max:1500'],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'topic.in' => 'Scegli un argomento valido.',
            'message.min' => 'Scrivi almeno qualche dettaglio per la richiesta.',
        ];
    }
}
