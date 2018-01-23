<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StartQuiz extends FormRequest
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
            'name' => 'required|max:50',
            'quiz' => 'required|exists:quizzes,id',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Lūdzu ievadi savu vārdu',
            'name.max'      => 'Maksimālais vārdu simbolu skaits ir 50',
            'quiz.required' => 'Lūdzu izvēlies testu',
            'quiz.exists'   => 'Šis tests mūsu datubāzē neeksistē',
        ];
    }
}
