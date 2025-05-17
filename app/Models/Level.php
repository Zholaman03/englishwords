<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Dictionary;
class Level extends Model
{
    //
    public function dictinory()
    {
        return $this->hasMany(Dictionary::class);
    }
}
