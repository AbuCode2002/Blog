<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'role' => 'required|integer',
        ];
    }
    public function messages()
    {
        return [
          'name.required' => 'Это поля необходимо заполнить',
          'name.string' => 'Данные должны быть строчного типа',
          'email.required' => 'Это поля необходимо заполнить',
          'email.email' => 'Это поля необходимо заполнить',
          'email.unique' => 'Пользователь с таким email уже существует',
        ];
    }
}
