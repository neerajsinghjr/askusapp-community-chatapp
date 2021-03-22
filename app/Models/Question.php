<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $guarded = [];

    protected $table = 'questions';

    protected $appends = ['is_liked'];

    /**
     * @return Categories;
     */
    function category() {
        return $this->belongsTo(Category::class, 'category_id');
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
        return $this->hasMany(Reply::class, 'question_id');
    }

    /**
     * @return Like;
     */
    public function likes() {
        return $this->morphToMany(Like::class, 'likeable');
    }

    /**
     * @return Append: isLiked;
     */
    public function getIsLikedAttribute() {
        $uid = Auth::id();
        $like = $this->likes()->whereUserID('user_id', $uid)->first();
        return ($like ? False : True);

    }

}   // End Of Question;