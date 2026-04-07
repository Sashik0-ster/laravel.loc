<?php

namespace App\Http\Requests\Incomes;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class IncomesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title'       => ['required', 'string', 'max:255'],
            'category'    => ['required', 'string', 'max:100'],
            'amount'      => ['required', 'numeric', 'min:0.01'],
            'currency'    => ['required', 'string', 'size:3'], // USD, UAH тощо
            'entry_date'  => ['required', 'date', 'before_or_equal:today'],
            'description' => ['nullable', 'string', 'max:1000'],
        ];
    }

    /**
     * Кастомні повідомлення про помилки
     */
    public function messages(): array
    {
        return [
            'title.required'      => 'Будь ласка, вкажіть джерело доходу.',
            'amount.required'     => 'Сума є обов’язковою.',
            'amount.numeric'      => 'Сума повинна бути числом.',
            'entry_date.required' => 'Оберіть дату отримання.',
            'entry_date.before_or_equal' => 'Дата не може бути в майбутньому.',
        ];
    }
}
