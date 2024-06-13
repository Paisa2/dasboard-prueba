<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CategoriaFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $roles = [
            'name' => [
                'required',
                'string',
                'max:255',
            ],
            'slog' => [
                'required',
                'string',
                'max:255',
            ],
            'descripcion' => [
                'required'
            ],
            'image' => [
                'required',
                'string',
                'mimes: jpng.jpg.png',
            ],
            'meta_titke' => [
                'required',
                'string',
                'max:255',
            ],
            'meta_descripcion' => [
                'required',
                'string',
                'max:255',
            ],
            'meta_keyword' => [
                'required',
                'string',
                'max:255',
            ],
            'navbar_status' => [
                'nullable',
                'boolean',
            ],
            'status' => [
                'required',
                'boolean',
            ],
        ];

        return $roles;
    }
}
