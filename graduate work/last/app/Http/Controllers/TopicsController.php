<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topic;
use App\Question;
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

        //$questions = DB::table('questions')
        //    ->join('topics', 'questions.topic_id', '=', 'topics.id')
        //    ->select('questions.*', 'topics.topic_name')
        //    ->get();
        //dump($topics );

        //dump($questionsActive);
        //dump($questionsWait);
        //dump($questionsHide);

        return view('admin.topics.index', compact('topics'));
        //->(['questionsWait' => $questionsWait,
        //    'questionsActive' => $questionsActive,
        //    '$questionsHide' => $questionsHide
        //    ]);
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
        /*
        $topic = new Topic;
        $topic->topic_name = $request->topic_name;
        $topic->save();
        */
        $this->validate($request, ['topic_name' => 'required|unique:topics|max:100']);
        Topic::create($request->all());
        Session::flash('flash_message', 'Тема успешно добавлена!');
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
        dump($input);
        $topic->fill($input)->save();
        Session::flash('flash_message', 'Тема успешно изменена!');
        //return redirect('/admin/topics');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $topic = Topic::findOrFail($id);
        $topic->delete();
        Session::flash('flash_message', 'Тема успешно удалена!');
        Log::info('Тема успешна удалена!');
        return redirect('/admin/topics');
    }
}
