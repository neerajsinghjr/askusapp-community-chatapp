<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Like extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'replies';

    protected $guarded = [];

    /**
     * @return Question;
     */
    public function questions() {
        return $this->morphedByMany(Question::class, 'likeable');
    }
    
    /**
     * @return Reply;
     */
    public function replies() {
        return $this->morphedByMany(Reply::class, 'likeable');
    }

    /** 
     * @return User;
     */
    public function users() {
        return $this->hasMany(User::class, 'user_id');
    }


}   // End of Likes;
