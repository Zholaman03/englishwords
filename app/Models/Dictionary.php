<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Dictionary extends Model
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

    public function wordProgress()
    {
        return $this->hasMany(WordProgress::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, table: 'word_progress')->withPivot('status')->withTimestamps();
    }
}
