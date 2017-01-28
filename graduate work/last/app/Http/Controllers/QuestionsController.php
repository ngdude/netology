<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Topic;
use DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class QuestionsController extends Controller
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
        $questions = Question::paginate(9);
        return view('admin.questions.index', compact('questions'));
    }
    public function indexStatus($status)
    {
        if ($status == 'waitting'){
            $status_id = 1;
        } elseif ($status == 'shown'){
            $status_id = 2;
        } else{
            $status_id = 3;
        }
        $questions = Question::where('status_id', '=', $status_id)->simplePaginate(10);;
        Log::info('Зашёл на страничку.');
        return view('admin.questions.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $topics =  Topic::all();
        return view('admin.questions.create', compact('topics'));
    }

    public function answer($id)
    {
        $question = Question::findOrFail($id);
        return view('admin.questions.answer', compact('question'));
    }

    public function answerUpdate(Request $request, $id)
    {
        $question = Question::findOrFail($id);
        $this->validate($request, ['answer' => 'required']);
        $input = $request->all();
        $question->fill($input)->save();
        Session::flash('flash_message', 'На вопрос успешно отвечено!');
        return redirect('/admin/questions');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dump($request);
        $this->validate($request, ['question' => 'required|max:100']);
        Question::create($request->all());
        Session::flash('flash_message', 'Вопрос успешно добавлен!');
        return redirect('/admin/questions');
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
        $question = Question::findOrFail($id);
        $topics = Topic::All();
        return view('admin.questions.edit', compact('question'))
            ->with(['topics' => $topics]);

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
        $question = Question::findOrFail($id);
        $this->validate($request, ['question' => 'required|max:100']);
        $input = $request->all();
        $question->fill($input)->save();
        Session::flash('flash_message', 'Вопрос успешно изменён!');
        return redirect('/admin/questions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question = Question::findOrFail($id);
        $question->delete();
        Session::flash('flash_message', 'Вопрос успешно удалён!');
        return redirect()->back();
    }

}


