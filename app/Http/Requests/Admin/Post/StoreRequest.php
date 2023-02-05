<?php

namespace App\Http\Requests\Admin\Post;

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
            'title' => 'required|string',
            'content' => 'required|string',
            'preview_image' => 'required|file',
            'main_image' => 'required|file',
            'category_id' => 'required|exists:categories,id',
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'nullable|integer|exists:tags,id'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Необхідно заповнити це поле',
            'title.string' => 'Вміст повинен відповідати строчному типу',
            'content.required' => 'Необхідно заповнити це поле',
            'content.string' => 'Вміст повинен відповідати строчному типу',
            'preview_image.file' => 'Необхідно обрати файл',
            'preview_image.required' => 'Необхідно заповнити це поле',
            'main_image.file' => 'Необхідно обрати файл',
            'main_image.required' => 'Необхідно заповнити це поле',
            'category_id.required' => 'Необхідно заповнити це поле',
            'category_id.integer' => 'Id категорії повинен бути числом',
            'category_id.exists' => 'Id категорії повинен існувати в базі даних',
            'tag_ids.array' => 'Необхідно відправити масив даних',

        ];
    }
}
