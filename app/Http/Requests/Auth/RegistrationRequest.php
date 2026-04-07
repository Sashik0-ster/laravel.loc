<?php

namespace App\Http\Requests\Auth;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Поле обов`язкове до заповнення',
            'email.required' => 'Поле обов`язкове до заповнення',
            'email.email' => 'Адреса має містити символ "@" ',
            'password.required' => 'Поле обов`язкове до заповнення',
            'password.min' =>  'Поле для пароля має містити щонайменше 8 символів.'
        ];
    }
}
