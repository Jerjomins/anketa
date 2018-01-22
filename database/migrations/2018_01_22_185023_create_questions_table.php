<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('quiz_id')->unsigned();
            $table->string('name');
            $table->timestamps();
        });

        Schema::table('questions', function (Blueprint $table) {
            $table->foreign('quiz_id')->references('id')->on('quizzes')->onDelete('cascade');
        });

        $questions = [
            [
                'name' => 'Cik zilonim ir kājas?',
                'quiz_id' => 1,
            ],
            [
                'name' => 'Cik cilvēkam ir zobi?',
                'quiz_id' => 1,
            ],
            [
                'name' => 'Pumas (kaķis) maksimālais ātrums?',
                'quiz_id' => 1,
            ],
            [
                'name' => 'Kura no atbildēm ir lieka?',
                'quiz_id' => 1,
            ],
            [
                'name' => '$x = 5, $x++, cik ir x?',
                'quiz_id' => 2,
            ],
            [
                'name' => 'PHP dibināšanas gads?',
                'quiz_id' => 2,
            ],
            [
                'name' => 'Draugiem.lv dibināšanas gads?',
                'quiz_id' => 2,
            ],
            [
                'name' => 'Kāds framework tiek lietots?',
                'quiz_id' => 2,
            ],
            [
                'name' => 'Kurā datumā ir Lācplēša diena?',
                'quiz_id' => 3,
            ],
            [
                'name' => 'Kurā datumā Latvijai dzimšanas diena?',
                'quiz_id' => 3,
            ],
            [
                'name' => 'Cik gadu ir Raimondam Paulam?',
                'quiz_id' => 4,
            ],
            [
                'name' => 'Cik gadu ir Valdim Zatleram?',
                'quiz_id' => 4,
            ],
            [
                'name' => 'Cik gadu ir Vairai Vīķei Freibergai?',
                'quiz_id' => 4,
            ],
            [
                'name' => 'Cik gadu ir Džordžam Volkeram Bušam?',
                'quiz_id' => 4,
            ],
            [
                'name' => 'Kas ir microsoft dibinātājs?',
                'quiz_id' => 5,
            ],
            [
                'name' => 'Kas ir apple dibinātājs?',
                'quiz_id' => 5,
            ],
            [
                'name' => 'Kas ir linux dibinātājs?',
                'quiz_id' => 5,
            ],
            [
                'name' => 'Kas ir nokia dibinātājs?',
                'quiz_id' => 5,
            ],
            [
                'name' => 'Kas ir google dibinātājs?',
                'quiz_id' => 5,
            ],
            [
                'name' => 'Uz kā bāzējās Android?',
                'quiz_id' => 5,
            ],
        ];

        foreach ($questions as $question) {
            DB::table('questions')->insert($question);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
