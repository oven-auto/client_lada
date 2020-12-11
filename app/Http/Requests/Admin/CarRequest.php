<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CarRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:2|max:255',
            'img' => 'required|image',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Название модели не введено',
            'name.min' => 'Название модели минимум 2 символа',
            'name.max' => 'Название модели максимум 255 символов',
            'img.required'  => 'Картинка не указана',
            'img.image'  => 'Картинка должна быть с расширением jpg,jpeg,png,bmp',
        ];
    }
}
