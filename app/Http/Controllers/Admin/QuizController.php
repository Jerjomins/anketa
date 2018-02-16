<?php

namespace App\Http\Controllers\Admin;

use App\Quiz;

class QuizController
{
    /**
     * @var Quiz
     */
    private $quiz;

    /**
     * QuizController constructor.
     * @param Quiz $quiz
     */
    public function __construct(Quiz $quiz)
    {
        $this->quiz = $quiz;
    }

    public function index()
    {
        return view('admin/quizzes', [
            'quizzes' => $this->quiz->all(),
        ]);
    }
}

