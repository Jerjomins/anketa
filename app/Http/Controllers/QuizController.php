<?php

namespace App\Http\Controllers;

use App\Http\Requests\StartQuiz;
use App\Http\Requests\storeQuiz;
use App\Question;
use App\Quiz;
use App\User;
use App\UserAnswers;
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
     * @var User
     */
    private $user;

    /**
     * @var UserAnswers
     */
    private $userAnswers;

    /**
     * QuestionController constructor.
     * @param Quiz $quiz
     * @param Question $question
     * @param User $user
     * @param UserAnswers $userAnswers
     */
    public function __construct(
        Quiz $quiz,
        Question $question,
        User $user,
        UserAnswers $userAnswers
    ) {
        $this->question = $question;
        $this->quiz = $quiz;
        $this->user = $user;
        $this->userAnswers = $userAnswers;
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
     * Show finish page of quiz
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function finish()
    {
        if ($userId = session('user_id')) {
            $user = $this->user->find($userId);
            session()->forget('user_id');
            return view('quiz_finish', compact('user'));
        }

        return redirect(route('quiz'));
    }

    /**
     * Start quiz, put questions object to javascript
     *
     * @param StartQuiz $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function start(StartQuiz $request)
    {
        $quizId = $request->input('quiz');

        $user = $this->user->create([
            'name'    => $request->input('name'),
            'ip'      => $request->ip(),
            'quiz_id' => $quizId,
        ]);

        $request->session()->put('user_id', $user->id);

        JavaScript::put([
            'theUser'         => $user,
            'getAnswersRoute' => route('answers.get'),
            'saveAnswerRoute' => route('answer.save'),
            'finishQuizRoute' => route('quiz.store'),
            'theAnswers'      => $this->quiz->find($quizId)->questions->first()->answers,
            'theQuestions'    => $this->quiz->find($quizId)->questions,
        ]);

        return view('questions');
    }

    /**
     * Store quiz correct answers, where answered on last question
     *
     * @param storeQuiz $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(storeQuiz $request)
    {
        $userId = $request->input('user_id');

        $user = $this->user->find($userId);
        $user->correct_answers = $this->getCorrectAnswers($userId);
        $user->save();

        return response()->json(['saved' => true, 'redirect' => route('quiz.finish')]);
    }

    /**
     * @param $userId
     * @return mixed
     */
    private function getCorrectAnswers($userId)
    {
        return $this->userAnswers->where([
            'user_id'          => $userId,
            'answered_correct' => true,
        ])->count();
    }
}
