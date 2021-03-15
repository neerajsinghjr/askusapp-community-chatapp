<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = "categories";

    /**
     * @return Questions;
     */
    function questions() {
        return $this->hasMany(Question::class);
    }

}   // End of Category;
