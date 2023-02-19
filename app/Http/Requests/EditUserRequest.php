<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditUserRequest extends FormRequest
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
            'password' => 'min:8|max:100',
            'instagram' => 'max:100',
            'twitter' => 'max:100',
            'twitch' => 'max:100',
        ];

    }

    public function messages()
    {
        return [
            'password.min' => 'Contraseña minimo de 8 caracteres',
            'password.max' => 'Contraseña minimo de 100 caracteres',
            'instagram.max' => 'Instagram maximo de 100 caracteres',
            'twitter.max' => 'Twitter maximo de 100 caracteres',
            'twitch.max' => 'Twitch maximo de 100 caracteres',
            
        ];
    }
}
