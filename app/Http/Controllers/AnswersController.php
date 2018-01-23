<?php

namespace App\Http\Controllers;

use App\Answers;
use App\Http\Requests\GetAnswers;
use App\Http\Requests\StoreAnswer;
use App\UserAnswers;

class AnswersController extends Controller
{
    /**
     * @var Answers
     */
    private $answers;

    /**
     * @var UserAnswers
     */
    private $userAnswers;

    /**
     * AnswersController constructor.
     * @param Answers $answers
     * @param UserAnswers $userAnswers
     */
    public function __construct(
        Answers $answers,
        UserAnswers $userAnswers
    ) {
        $this->answers = $answers;
        $this->userAnswers = $userAnswers;
    }

    /**
     * Get answers for current question and quiz.
     *
     * @param GetAnswers $request
     * @return bool|\Illuminate\Http\JsonResponse
     */
    public function get(GetAnswers $request)
    {
        if (request()->ajax()) {
            return response()->json($this->answers->where([
                'question_id' => $request->input('question_id'),
                'quiz_id'     => $request->input('quiz_id'),
            ])->get());
        }

        return response()->json(['error' => 'not ajax request']);
    }

    /**
     * Save answer, when user answered on question
     *
     * @param StoreAnswer $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function save(StoreAnswer $request)
    {
        $answerId = $request->input('answer_id');
        $answer = $this->answers->find($answerId);

        $this->userAnswers->create([
            'user_id'             => $request->input('user_id'),
            'quiz_id'             => $request->input('quiz_id'),
            'question_id'         => $request->input('question_id'),
            'answer_id'           => $answerId,
            'answered_correct' => $answer->correct_answer,
        ]);

        return response()->json(['saved' => true]);
    }
}
