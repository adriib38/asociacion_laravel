<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
            'name' => 'required|min:5|max:200',
            'description' => 'required|min:5|max:900',
            'location' => 'required|min:5|max:200',
            'date' => 'required|date',
            'hour' => 'required',
            'tags' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es obligatorio',
            'name.min' => 'Nombre minimo de 5 caracteres',
            'name.max' => 'Nombre maximo de 200 caracteres',
            'description.required' => 'Descripcion es obligatoria',
            'description.min' => 'Descripcion minima de 5 carcteres',
            'description.max' => 'Descripcion maxima de 900 caracteres',
            'location.required' => 'Localizacion obligatoria',
            'location.max' => 'Localizacion maxima de 200 caracteres',
            'location.min' => 'Localizacion minima de 5 caracteres',
            'date.required' => 'Fecha obligatoria',
            'date.date' => 'Fecha no valida',
            'hour.required' => 'Hora obligatoria',
            'tags.required' => 'Tags obligatorios'
        ];



    }
}
