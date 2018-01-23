<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GetAnswers extends FormRequest
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
            'question_id' => 'required|exists:questions,id',
            'quiz_id'     => 'required|exists:quizzes,id',
            'answer_id'   => 'integer|exists:answers,id',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'answer_id.integer' => 'Lūdzu izvēlieties atbildi!',
        ];
    }
}
