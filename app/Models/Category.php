<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $table = "categories";

    /**
     * @return Questions;
     */
    function questions() {
        return $this->hasMany(Question::class);
    }

}   // End of Category;
