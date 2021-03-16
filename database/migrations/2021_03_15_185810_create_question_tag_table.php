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
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger("category_id");
            $table->string('title');
            $table->string('slug');
            $table->longText('description');
            $table->softDeletesTz();
            $table->timestamps();

            // Foreign Relations;
            $table->foreign("user_id")->references('id')->on('users')->onDelete('cascade');
            $table->foreign("category_id")->references('id')->on('categories')->onDelete("set null");
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
