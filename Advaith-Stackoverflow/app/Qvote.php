<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Qvote extends Model
{
    public function user() {
        return $this->belongsTo('App\User');
    }
    public function question() {
        return $this->belongsTo('App\Question');
    }
}
