<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_tag', function (Blueprint $table) {

            $table->id();
            $table->softDeletesTz();
            $table->timestamps();

            // Foreign Relations;
            $table->foreignId('user_id')
                    ->nullable()
                    ->constrained('users')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

            $table->foreignId("question_id")
                    ->nullable()
                    ->constrained('questions')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

            $table->foreignId("tag_id")
                    ->nullable()
                    ->constrained('tags')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('question_tag');
    }
}
