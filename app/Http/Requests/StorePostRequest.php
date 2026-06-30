<?php

namespace App\Http\Requests;

use App\Models\Post;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()?->can('create', Post::class) ?? false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'min:3', 'max:160'],
            'excerpt' => ['required', 'string', 'min:12', 'max:500'],
            'body' => ['required', 'string', 'min:20', 'max:5000'],
            'source_url' => ['nullable', 'url', 'max:2048'],
            'published_at' => ['nullable', 'date', 'before_or_equal:today'],
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'title' => 'titolo',
            'excerpt' => 'riassunto',
            'body' => 'contenuto',
            'source_url' => 'link fonte',
            'published_at' => 'data pubblicazione',
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'title' => Str::squish((string) $this->input('title')),
            'excerpt' => Str::squish((string) $this->input('excerpt')),
            'body' => trim((string) $this->input('body')),
            'source_url' => filled($this->input('source_url')) ? trim((string) $this->input('source_url')) : null,
        ]);
    }
}
