<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $table = 'replies';

    protected $guarded = [];

    /**
     * @return User;
     */
    public function questions() {
        return $this->belongsToMany(Question::class, 'question_id');
    }

    /** 
     * @return User;
     */
    public function users() {
        return $this->belongsToMany(User::class, 'user_id');
    }

    /**
     * @return Reply;
     */
    public function replies() {
        return $this->belongsToMany(Reply::class, 'reply_id');
    }

}   // End of Likes;
