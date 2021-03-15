<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'questions';

    /**
     * @return Categories;
     */
    function category() {
        return $this->belongsTo(Category::class);
    }

    /**
     * @return Tags;
     */
    function tags() {
        return $this->hasMany(Tag::class);
    }

    /**
     * @return Replies;
     */
    function replies() {
        return $this->hasMany(Reply::class);
    }

}   // End Of Question;
