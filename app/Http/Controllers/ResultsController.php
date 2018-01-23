<?php

namespace App\Http\Controllers;

use App\User;

class ResultsController extends Controller
{
    /**
     * @var User
     */
    private $user;

    /**
     * ResultsController constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $users = $this->user->whereNotNull('correct_answers')->orderBy('updated_at', 'desc')->paginate(40);
        return view('results', compact('users'));
    }
}
