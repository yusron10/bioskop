<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FilmRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'genre_id' => 'required',
            'judul' => 'required',
            'tahun' => 'required|max:4|unique:films',
            'deskripsi' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'tahun.required' => 'Lihat Kalender Tahun itu 4 angka'
        ];
    }
}
