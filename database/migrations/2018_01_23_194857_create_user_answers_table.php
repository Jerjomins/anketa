<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_answers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('quiz_id')->unsigned();
            $table->integer('question_id')->unsigned();
            $table->integer('answer_id')->unsigned();
            $table->boolean('answered_correct');
            $table->timestamps();
        });

        Schema::table('user_answers', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('user_answers', function (Blueprint $table) {
            $table->foreign('quiz_id')->references('id')->on('quizzes');
        });

        Schema::table('user_answers', function (Blueprint $table) {
            $table->foreign('question_id')->references('id')->on('questions');
        });

        Schema::table('user_answers', function (Blueprint $table) {
            $table->foreign('answer_id')->references('id')->on('answers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_answers');
    }
}
