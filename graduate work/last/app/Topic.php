<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    //
    protected $fillable = ['topic_name'];

    public function getQuestions()
    {
        return $this->hasMany('App\Question');
    }

}