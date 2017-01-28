<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //
	protected $fillable = ['name','email','topic_id','question','answer','status_id'];

	public function status()
	{
		return $this->belongsTo('App\Status');
	}

	public function topic()
	{
		return $this->belongsTo('App\Topic');
	}

}


