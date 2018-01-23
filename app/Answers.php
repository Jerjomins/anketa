<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answers extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'quiz_id', 'question_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'correct_answer',
    ];
}
