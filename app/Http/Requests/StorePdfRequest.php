<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use ProtoneMedia\LaravelMixins\Request\ConvertsBase64ToFiles;

class StorePdfRequest extends FormRequest
{
    use ConvertsBase64ToFiles;

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function base64FileKeys(): array
    {
        return [
            'file' => 'file.pdf',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'file' => 'required|file|mimes:pdf',
        ];
    }
}
