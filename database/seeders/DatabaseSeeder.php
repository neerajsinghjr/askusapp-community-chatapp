<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User Build
        \App\Models\User::factory(10)->create();
        // Category Build
        \App\Models\Category::factory(10)->create();
        // Tag Build
        \App\Models\Tag::factory(20)->create();
        // Quesiton Build
        \App\Models\Question::factory(25)->afterCreating(function($question) {
            $question->tags()->attach(rand(1,25));
            $question->likes()->attach(rand(0,1));
        });
        // Reply Build
        \App\Models\Reply::factory(40)->afterCreating(function($replies) {
            $replies->likes()->attach(rand(0,1));
        });
    }
}
