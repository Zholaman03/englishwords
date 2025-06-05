<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Dictinory extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'word',
        'definition',
        'example',
        'translation',
        'example_translation',
        'pronunciation',
        'level_id',
    ];

    protected $dates = ['deleted_at'];

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function savedByUsers()
    {
        return $this->belongsToMany(User::class, 'saved_words')->withTimestamps();
    }
}
