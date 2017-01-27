<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Topic;
use Illuminate\Support\Facades\Session;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::all();;
        $topics = topic::all();;
        return view('faq')->with(['questions'=>$questions,
        'topics'=>$topics
        ]);
    }
    public function ask()
    {
        $topics = topic::all();;
        return view('ask',compact('topics'));
    }

    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required|max:100',
                'email' => 'required|email|max:100',
                'topic_id' => 'required',
                'question' => 'required'
                ]);
        Question::create($request->all());
        Session::flash('flash_message', 'Вопрост добавлен!');
        return redirect('/ask');
    }

    public function indexAdmin()
    {
        $this->middleware('auth');
        return view('admin.index');
    }

    public function addTopic(Request $request)
    {
        $this->validate($request, [
            'topic_name' => 'required|unique:topics|max:100',
        ]);
        //dump($request);
        $data = $request->all();
        $topic = new Topic;
        $topic->fill($data);
        $topic->save();
        return redirect('/admin/topics');
    }
}