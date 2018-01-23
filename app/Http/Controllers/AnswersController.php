<?php

namespace App\Http\Controllers;

use App\Answers;
use App\Http\Requests\StoreAnswer;
use Illuminate\Http\Request;

class AnswersController extends Controller
{
    /**
     * @var Answers
     */
    private $answers;

    /**
     * AnswersController constructor.
     * @param Answers $answers
     */
    public function __construct(Answers $answers)
    {
        $this->answers = $answers;
    }

    /**
     * Get answers for current question and quiz.
     *
     * @param StoreAnswer $request
     * @return bool|\Illuminate\Http\JsonResponse
     */
    public function get(StoreAnswer $request)
    {
        if (request()->ajax()) {
            return response()->json($this->answers->where([
                'question_id' => $request->input('question_id'),
                'quiz_id'     => $request->input('quiz_id'),
            ])->get());
        }

        return false;
    }

    public function post()
    {

    }
}
