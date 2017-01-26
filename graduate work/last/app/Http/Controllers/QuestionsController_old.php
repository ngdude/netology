<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Topic;
use App\Answer;
class QuestionsController extends Controller
{
	public function faq() {
	//$questions = Question::all();
	$questions = Question::select(['topic_id','question','answer_id'])->get();
	$topics = Topic::select(['id','topic_name'])->get();
	$answers = Answer::select(['id','answer']);
	//dump($questions);
		return view('faq')->with(['questions'=>$questions,
					  'topics'=>$topics,
					  'answers'=>$answers]);
	}

	public function admin() {
        //$questions = Question::all();
        $questions = Question::select(['topic_id','question','answer_id'])->get();
        $topics = Topic::select(['id','topic_name'])->get();
        $answers = Answer::select(['id','answer']);
        //dump($questions);
                return view('admin')->with(['questions'=>$questions,
                                          'topics'=>$topics,
                                          'answers'=>$answers]);
        }


	public function add() {
		$topics = Topic::select(['id','topic_name'])->get();
		return view('add-question')->with(['topics'=>$topics]);
	}

	public function store(Request $request)
	{
		$this->validate($request, [
			'name' => 'required|max:100',
			'email' => 'required|max:100',
			'topic_id' => 'required',
			'question' => 'required|unique:questions|max:255'
		  	]);
		//dump($request);
		$data = $request->all();
		$question = new Question;
		$question->fill($data);
		$question->save();
		return redirect('add/');
	}

}
