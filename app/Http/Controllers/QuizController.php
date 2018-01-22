<?php

namespace App\Http\Controllers;

use App\Http\Requests\StartQuestion;
use App\Question;
use App\Quiz;
use JavaScript;

class QuizController extends Controller
{
    /**
     * @var Quiz
     */
    private $question;

    /**
     * @var Quiz
     */
    private $quiz;

    /**
     * QuestionController constructor.
     * @param Quiz $quiz
     * @param Question $question
     */
    public function __construct(Quiz $quiz, Question $question)
    {
        $this->question = $question;
        $this->quiz = $quiz;
    }

    /**
     * Show quizzes start form
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('quizzes', [
            'quizzes' => $this->quiz->all(),
        ]);
    }

    /**
     * Start quiz, put questions object to javascript
     *
     * @param StartQuestion $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function start(StartQuestion $request)
    {
        JavaScript::put([
            'getAnswers'   => route('answers.get'),
            'theQuestions' => $this->quiz->find($request->input('question'))->questions,
        ]);

        return view('questions');
    }
}
