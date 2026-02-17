<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGameRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|unique:games,title|max:255',
            'developer' => 'required|string|max:100',
            'publisher' => 'string|max:200',
            'date_released' => 'required|date',
            'platform' => 'required',
            'genre' => 'required',
            'gamemode' => 'required',
            'age_rating' => 'required',
            'description' => 'required|string',
            'image' => 'required|image|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'El título es obligatorio.',
            'title.unique' => 'Ya existe un juego con ese título.',
            'title.max' => 'El título no puede superar los 255 caracteres.',
            'developer.required' => 'La desarrolladora es obligatoria.',
            'developer.max' => 'La desarrolladora no puede superar los 100 caracteres.',
            'publisher.max' => 'La distribuidora no puede superar los 200 caracteres.',
            'date_released.date' => 'La fecha de lanzamiento no es válida.',
            'platform.required' => 'La plataforma es obligatoria.',
            'genre.required' => 'El género es obligatorio.',
            'gamemode.required' => 'El modo de juego es obligatorio.',
            'age_rating.required' => 'La clasificación por edad es obligatoria.',
            'image.image' => 'El archivo debe ser una imagen.',
            'image.max' => 'La imagen no puede superar los 2MB.',
        ];
    }
}
