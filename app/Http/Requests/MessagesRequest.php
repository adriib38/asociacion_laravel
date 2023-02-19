<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MessagesRequest extends FormRequest
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
            'name' => 'required|min:3|max:40',
            'subject' => 'required|min:3|max:40',
            'text' => 'required|min:5|max:500',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nombre es obligatorio',
            'name.min' => 'Nombre debe tener minimo 3 caracteres',
            'name.max' => 'Nombre debe tener máximo 40 caracteres',
            'subject.required' => 'Asunto es obligatorio',
            'subject.min' => 'Asunto debe tener minimo 3 caracteres',
            'subject.max' => 'Asunto debe tener máximo 40 caracteres',
            'text.required' => 'Campo texto es obligatorio',
            'text.min' => 'Mensaje debe tener al menos 5 caracteres',
            'text.max' => 'Mensaje debe tener como máximo 500 caracteres',
        ];
    }
}
