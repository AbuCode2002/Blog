<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'title' => 'required|string',
            'content' => 'required|string',
            'preview_image' => 'nullable|file',
            'main_image' => 'nullable|file',
            'category_id' => 'required|exists:categories,id',
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'nullable|exists:tags,id',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Это поля необходимо заполнить',
            'title.string' => 'Данные должны быть строчного типа',
            'content.required' => 'Это поля необходимо заполнить',
            'content.string' => 'Данные должны быть строчного типа',
            'preview_image.required' => 'Это поля необходимо заполнить',
            'preview_image.file' => 'Необходима выбрать файл',
            'main_image.required' => 'Это поля необходимо заполнить',
            'main_image.file' => 'Необходима выбрать файл',
            'category_id.required' => 'Это поля необходимо заполнить',
            'category_id.exists' => 'ID категорий должен быть в базе',
            'tag_ids.array' => 'Необходимо отправить массив данных',
        ];
    }
}
