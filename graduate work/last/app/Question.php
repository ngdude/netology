<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //
	protected $fillable = ['name','email','topic_id','question','answer','status'];
}
