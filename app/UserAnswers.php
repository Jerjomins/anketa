<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAnswers extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'quiz_id', 'question_id', 'answer_id', 'answered_correct'
    ];
}
