<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('quiz_id')->unsigned();
            $table->integer('question_id')->unsigned();
            $table->string('name');
            $table->boolean('correct_answer')->default(false);
            $table->timestamps();
        });

        Schema::table('answers', function (Blueprint $table) {
            $table->foreign('quiz_id')->references('id')->on('quizzes');
        });

        Schema::table('answers', function (Blueprint $table) {
            $table->foreign('question_id')->references('id')->on('questions');
        });

        $answers = [
            [
                'name'        => 'Divas kājas',
                'quiz_id'     => 1,
                'question_id' => 1,
            ],
            [
                'name'           => 'Četras kājas',
                'quiz_id'        => 1,
                'question_id'    => 1,
                'correct_answer' => true,
            ],
            [
                'name'        => 'Trīs kājas',
                'quiz_id'     => 1,
                'question_id' => 1,
            ],
            [
                'name'        => 'Nav kāju',
                'quiz_id'     => 1,
                'question_id' => 1,
            ],
            [
                'name'        => '32 zobi',
                'quiz_id'     => 1,
                'question_id' => 2,
                'correct_answer' => true,
            ],
            [
                'name'        => '12 zobi',
                'quiz_id'     => 1,
                'question_id' => 2,
            ],
            [
                'name'        => '22 zobi',
                'quiz_id'     => 1,
                'question_id' => 2,
            ],
            [
                'name'        => '1 zobs',
                'quiz_id'     => 1,
                'question_id' => 2,
            ],
            [
                'name'        => '36 zobi',
                'quiz_id'     => 1,
                'question_id' => 2,
            ],
            [
                'name'        => '32 km/h',
                'quiz_id'     => 1,
                'question_id' => 3,
            ],
            [
                'name'        => '220 km/h',
                'quiz_id'     => 1,
                'question_id' => 3,
            ],
            [
                'name'        => '80 km/h',
                'quiz_id'     => 1,
                'question_id' => 3,
                'correct_answer' => true,
            ],
            [
                'name'        => '2 km/h',
                'quiz_id'     => 1,
                'question_id' => 3,
            ],
            [
                'name'        => 'Apple',
                'quiz_id'     => 1,
                'question_id' => 4,
            ],
            [
                'name'        => 'Samsung',
                'quiz_id'     => 1,
                'question_id' => 4,
            ],
            [
                'name'        => 'Nokia',
                'quiz_id'     => 1,
                'question_id' => 4,
            ],
            [
                'name'        => 'Telefons',
                'quiz_id'     => 1,
                'question_id' => 4,
                'correct_answer' => true,
            ],
            [
                'name'        => '4',
                'quiz_id'     => 2,
                'question_id' => 5,
            ],
            [
                'name'        => 'Neviens',
                'quiz_id'     => 2,
                'question_id' => 5,
                'correct_answer' => true,
            ],
            [
                'name'        => '3',
                'quiz_id'     => 2,
                'question_id' => 5,
            ],
            [
                'name'        => '1',
                'quiz_id'     => 2,
                'question_id' => 5,
            ],
            [
                'name'        => '1994 gads',
                'quiz_id'     => 2,
                'question_id' => 6,
                'correct_answer' => true,
            ],
            [
                'name'        => '1997 gads',
                'quiz_id'     => 2,
                'question_id' => 6,
            ],
            [
                'name'        => '2005 gads',
                'quiz_id'     => 2,
                'question_id' => 7,
            ],
            [
                'name'        => '2001 gads',
                'quiz_id'     => 2,
                'question_id' => 7,
            ],
            [
                'name'        => '2004 gads',
                'quiz_id'     => 2,
                'question_id' => 7,
                'correct_answer' => true,
            ],
            [
                'name'        => 'Lumen',
                'quiz_id'     => 2,
                'question_id' => 8,
            ],
            [
                'name'        => 'Yii',
                'quiz_id'     => 2,
                'question_id' => 8,
            ],
            [
                'name'        => 'Laravel',
                'quiz_id'     => 2,
                'question_id' => 8,
                'correct_answer' => true,
            ],
            [
                'name'        => 'Jommla',
                'quiz_id'     => 2,
                'question_id' => 8,
            ],
            [
                'name'        => 'Nav ko, Ucoz!',
                'quiz_id'     => 2,
                'question_id' => 8,
            ],
            [
                'name'        => '11. Septembris',
                'quiz_id'     => 3,
                'question_id' => 9,
            ],
            [
                'name'        => '21. Augusts',
                'quiz_id'     => 3,
                'question_id' => 9,
            ],
            [
                'name'        => '11. Novembris',
                'quiz_id'     => 3,
                'question_id' => 9,
                'correct_answer' => true,
            ],
            [
                'name'        => '15. Decembris',
                'quiz_id'     => 3,
                'question_id' => 9,
            ],
            [
                'name'        => '18. Novembris',
                'quiz_id'     => 3,
                'question_id' => 10,
                'correct_answer' => true,
            ],
            [
                'name'        => '25. Janvāris',
                'quiz_id'     => 3,
                'question_id' => 10,
            ],
            [
                'name'        => '11. Novembris',
                'quiz_id'     => 3,
                'question_id' => 10,
            ],
            [
                'name'        => '5. Maijs',
                'quiz_id'     => 3,
                'question_id' => 10,
            ],
            [
                'name'        => 'Sotaks',
                'quiz_id'     => 4,
                'question_id' => 11,
            ],
            [
                'name'        => '82 Gadi',
                'quiz_id'     => 4,
                'question_id' => 11,
                'correct_answer' => true,
            ],
            [
                'name'        => '25 Gadi',
                'quiz_id'     => 4,
                'question_id' => 11,
            ],
            [
                'name'        => '91 Gadi',
                'quiz_id'     => 4,
                'question_id' => 11,
            ],
            [
                'name'        => '83 Gadi',
                'quiz_id'     => 4,
                'question_id' => 12,
            ],
            [
                'name'        => '67 Gadi',
                'quiz_id'     => 4,
                'question_id' => 12,
            ],
            [
                'name'        => '63 Gadi',
                'quiz_id'     => 4,
                'question_id' => 12,
                'correct_answer' => true,
            ],
            [
                'name'        => '53 Gadi',
                'quiz_id'     => 4,
                'question_id' => 13,
            ],
            [
                'name'        => '33 Gadi',
                'quiz_id'     => 4,
                'question_id' => 13,
            ],
            [
                'name'        => '122 Gadi',
                'quiz_id'     => 4,
                'question_id' => 13,
            ],
            [
                'name'        => '81 Gadi',
                'quiz_id'     => 4,
                'question_id' => 13,
                'correct_answer' => true,
            ],
            [
                'name'        => '74 Gadi',
                'quiz_id'     => 4,
                'question_id' => 14,
            ],
            [
                'name'        => '72 Gadi',
                'quiz_id'     => 4,
                'question_id' => 14,
                'correct_answer' => true,
            ],
            [
                'name'        => '73 Gadi',
                'quiz_id'     => 4,
                'question_id' => 14,
            ],
            [
                'name'        => 'Bills Geits',
                'quiz_id'     => 5,
                'question_id' => 15,
                'correct_answer' => true,
            ],
            [
                'name'        => 'Lauris Reiniks',
                'quiz_id'     => 5,
                'question_id' => 15,
            ],
            [
                'name'        => 'Stīvs Džobss',
                'quiz_id'     => 5,
                'question_id' => 15,
            ],
            [
                'name'        => 'Stīvs Džobss',
                'quiz_id'     => 5,
                'question_id' => 16,
                'correct_answer' => true,
            ],
            [
                'name'        => 'Mans kaimiņš',
                'quiz_id'     => 5,
                'question_id' => 16,
            ],
            [
                'name'        => 'Bills Geits',
                'quiz_id'     => 5,
                'question_id' => 16,
            ],
            [
                'name'        => 'Linuss Lins',
                'quiz_id'     => 5,
                'question_id' => 17,
            ],
            [
                'name'        => 'Bryan Linux',
                'quiz_id'     => 5,
                'question_id' => 17,
            ],
            [
                'name'        => 'Linuss Torvaldss',
                'quiz_id'     => 5,
                'question_id' => 17,
                'correct_answer' => true,
            ],
            [
                'name'        => 'Fredriks Idestams',
                'quiz_id'     => 5,
                'question_id' => 18,
                'correct_answer' => true,
            ],
            [
                'name'        => 'Bjerns Vesterlunds',
                'quiz_id'     => 5,
                'question_id' => 18,
            ],
            [
                'name'        => 'Ojārs Vācietis',
                'quiz_id'     => 5,
                'question_id' => 19,
            ],
            [
                'name'        => 'Sergejs Brins',
                'quiz_id'     => 5,
                'question_id' => 19,
                'correct_answer' => true,
            ],
            [
                'name'        => 'Marks Zakerbergs',
                'quiz_id'     => 5,
                'question_id' => 19,
            ],
            [
                'name'        => 'Linux',
                'quiz_id'     => 5,
                'question_id' => 20,
            ],
            [
                'name'        => 'Google',
                'quiz_id'     => 5,
                'question_id' => 20,
            ],
            [
                'name'        => 'Apple',
                'quiz_id'     => 5,
                'question_id' => 20,
            ],
            [
                'name'        => 'Nav ne jausmas',
                'quiz_id'     => 5,
                'question_id' => 20,
            ],
        ];

        foreach ($answers as $answer) {
            DB::table('answers')->insert($answer);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('answers');
    }
}
