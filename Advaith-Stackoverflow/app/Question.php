<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function tags() {
    	return $this->belongsToMany('App\Tag');
    }
    public function user() {
    	return $this->belongsTo('App\User');
    }
    public function answers() {
        return $this->hasMany('App\Answer');
    }
    public function qvotes() {
        return $this->hasMany('App\Qvote');
    }
}
