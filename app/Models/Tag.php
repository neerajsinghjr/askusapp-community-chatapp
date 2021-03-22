<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    protected $table = "tags";

    /**
     * @return Questions;
     */
    function questions() {
        $this->belongsTo(Question::class);
    }

}   // End of Tag;
