<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topic;
use Auth;
use DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class TopicsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $topics = Topic::paginate(9);
            return view('admin.topics.index', compact('topics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('admin.topics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $this->validate($request, ['topic_name' => 'required|unique:topics|max:100']);
        $topic = Topic::create($request->all());
        $topic;
        Session::flash('flash_message',"Тема: $topic->topic_name успешно добавлена!");
        Log::info(Auth::user()->name." добавил Тему: $topic->topic_name");
        return redirect('/admin/topics');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $topic = Topic::findOrFail($id);
        return view('admin.topics.edit', compact('topic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $topic = Topic::findOrFail($id);
        $this->validate($request, ['topic_name' => 'required|unique:topics|max:100']);
        $input = $request->all();
        $topic->fill($input)->save();
        Session::flash('flash_message', "Тема: $topic->topic_name успешно изменена!");
        Log::info(Auth::user()->name." Изменил Тему: $topic->topic_name");
        return redirect('/admin/topics');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function destroy($id, Request $request)
    {
        $topic = Topic::findOrFail($id);
        $questionsAtTopic = $topic->getQuestions;
        foreach ($questionsAtTopic as $question){
            $question->delete();
        }
        $topic->delete();
        Session::flash('flash_message', "Тема: $topic->topic_name и все вопросы в ней, успешно удалены!");
        Log::info(Auth::user()->name." удалил Тему: $topic->topic_name и все вопросы в ней");
        return redirect('/admin/topics');
    }
}
