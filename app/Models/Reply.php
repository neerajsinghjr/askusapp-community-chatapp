<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = "replies";

    /**
     * @return Question;
     */
    function question() {
        return $this->belongsTo(Question::class);
    }

    /**
     * @return Like;
     */
    function likes() {
        return $this->hasMany(Like::class, 'reply_id');
    }

}   // End of Reply;
