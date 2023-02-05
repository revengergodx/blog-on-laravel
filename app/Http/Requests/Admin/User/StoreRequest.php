<?php

namespace App\Http\Requests\Admin\User;

use App\Models\User;
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
            'email' => 'required|string|email|unique:'.User::class,
            'role' => 'required|string',

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Необхідно заповнити це поле',
            'name.string' => 'Дані повинні бути строчного типу',
            'email.required' => 'Необхідно заповнити це поле',
            'email.string' => 'Дані повинні бути строчного типу',
            'email.email' => 'Email повинен відповідати зразку email@email.com',
            'email.unique' => 'Такий email вже використовується',
            'password.required' => 'Необхідно заповнити це поле',
            'password.string' => 'Дані повинні бути строчного типу'
        ];
    }
}
