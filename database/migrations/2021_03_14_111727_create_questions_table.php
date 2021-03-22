<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {

            $table->id();
            $table->string('title')->unique();
            $table->string('slug');
            $table->longText('description');
            $table->softDeletesTz();
            $table->timestamps();

            // Foreign Relations;
            $table->foreignId('user_id')
                    ->nullable()
                    ->constrained('users')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
                    
            $table->foreignId('category_id')
                    ->nullable()
                    ->constrained('categories')
                    ->onUpdate('cascade')
                    ->onDelete('set null');

        });
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
