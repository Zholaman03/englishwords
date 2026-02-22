<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WordProgress extends Model
{
    //
        protected $fillable = [
            'user_id',
            'dictionary_id',
            'status',
        ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function dictionary()
    {
        return $this->belongsTo(Dictionary::class);
    }   
}
