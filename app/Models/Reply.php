<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reply extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $table = "replies";

    /**
     * @return Question;
     */
    function question() {
        return $this->belongsTo(Question::class, 'question_id');
    }

    /**
     * @return Like;
     */
    public function likes() {
        return $this->morphToMany(Like::class, 'likeable');
    }

    public function getIsLikedAttribute() {
        $uid = Auth::id();
        $like = $this->likes()->where('user_id', $uid)->first();
        return ($like ? False : True);
    }

}   // End of Reply;
