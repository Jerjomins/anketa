<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateQuizzesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quizzes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        $questions = [
            1 => 'Pirmais tests ar jautājumiem!',
            2 => 'Vairāk par programmēšanu.',
            3 => 'Jautājumi par Latviju.',
            4 => 'Vai tu zini cik gadu ir šiem cilvēkiem?',
            5 => 'Vai tu zini kas viņus ir radījuši?',
        ];

        foreach ($questions as $id => $name) {
            DB::table('quizzes')->insert([
                'id'   => $id,
                'name' => $name,
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quizzes');
    }
}
