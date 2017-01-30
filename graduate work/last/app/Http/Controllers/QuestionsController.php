<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Topic;
use Auth;
use DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class QuestionsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Запрос к базе
     * перенаправляет в шаблон
     */
    public function index()
    {
        $questions = Question::where('status_id', '!=' , 4)->paginate(9);
        return view('admin.questions.index', compact('questions'));
    }

    /**
     * Запрос к базе
     * перенаправляет в шаблон
     */
    public function indexBlocked()
    {
        $blockedWords = QuestionsController::listWords();
        $questions = Question::where('status_id', '=' , 4)->paginate(9);
        return view('admin.blocked.index', compact('questions'))->with(['blockedWords' => $blockedWords]);
    }


    /**Получает переменную из $status
     * Проверяет условие
     * Применяет перемунную и делает запрос к базе
     * перенаправляет данные в шаблон
     */
    public function indexStatus($status)
    {
        if ($status == 'waitting'){
            $statusId = 1;
        } elseif ($status == 'shown'){
            $statusId = 2;
        } else
            $statusId = 3;
        $questions = Question::where('status_id', '=', $statusId)->simplePaginate(10);
        return view('admin.questions.index', compact('questions'));
    }

    /**
     * Запрос к базе
     * перенаправляет данные в шаблон
     */
    public function create()
    {
        $topics =  Topic::all();
        return view('admin.questions.create', compact('topics'));
    }

    /**
     * Получает данные из $id
     * Запрос к базе
     * перенаправляет данные в шаблон
     */
    public function answer($id)
    {
        $question = Question::findOrFail($id);
        return view('admin.questions.answer', compact('question'));
    }

    /**
     * Запрос к базе
     * перенаправляет данные в шаблон
     */
    public function updateAnswer(Request $request, $id)
    {
        $question = Question::findOrFail($id);
        $this->validate($request, ['answer' => 'required']);
        $input = $request->all();
        $question->fill($input)->save();
        Session::flash('flash_message', "На вопрос \"$question->question\" успешно отвечено!");
        Log::info(Auth::user()->name." ответил на вопрос ($question->id) \"$question->question\" в теме \"".$question->topic->topic_name."\"");
        return redirect($request->previousUri);
    }

    /**
     * Метод для првоерки темы
     * на наличее запрешённых слов
     * @param  \Illuminate\Http\Request  $request
     */
    
    public function checkWords($request)
    {
        $find = DB::table('words')->select('name')->get()->toArray();
        if(count($find) !== 0) {
            foreach ($find as $value) {
                $newArray[] = $value->name;
            }
            $data = $request->all();
            $question = $data['question'];
            foreach ($newArray as $value) {
                if ((mb_stripos($question, $value)) !== false) {
                    return $value;
                }
            }
        }
       return false;
    }

    /**
     * Метод для получения списка запрещённых слов
     */
    public function listWords()
    {
        $find = DB::table('words')->select('name')->get()->toArray();
        $newarray = array();
        foreach ($find as $value){
            $newarray[] = $value->name;
        }
        return $newarray;
    }

    /**
     * Получает данные из $request
     * Проверяет наличие стоп слов
     * Если находит добавляет в пответ переменную
     * 
     * Формирует сообщения в Session
     * пишет Log
     * перенаправляет в указанное место
     * @param  \Illuminate\Http\Request $request
     */
    public function store(Request $request)
    {
        if ((QuestionsController::checkWords($request)) != false){
            $request->request->add(['status_id' => 4]);
        }
        $this->validate($request, ['question' => 'required|max:100']);
        $question = Question::create($request->all());
        $question;
        Session::flash('flash_message', "Вопрос \"$question->question\" успешно добавлен!");
        Log::info(Auth::user()->name." добавил вопрос ($question->id) \"$question->question\" в тему \"".$question->topic->topic_name."\"");
        return redirect($request->previousUri);
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
     * Получает данные из $id
     * Запрос к базе по id
     * Запрос к базе
     * пишет Log
     * перенаправляет в шаблон
     */
    public function edit($id)
    {
        $question = Question::findOrFail($id);
        $topics = Topic::All();
        return view('admin.questions.edit', compact('question'))
            ->with(['topics' => $topics]);

    }

    /**
     * Получает данные из $request и $id
     * Запрос к базе по id
     * проверят указанные данные с параметрами валидации
     * записывает в базу
     * Формирует сообщения в Session
     * пишет Log
     * перенаправляет в предидущую страницу
     * @param  \Illuminate\Http\Request $request
     */
    public function update(Request $request, $id)
    {
        $question = Question::findOrFail($id);
        $this->validate($request, ['question' => 'required|max:100']);
        $input = $request->all();
        $question->fill($input)->save();
        Session::flash('flash_message', "Вопрос \"$question->question\" успешно изменён!");
        Log::info(Auth::user()->name." изменил вопрос ($question->id) \"$question->question\" в теме \"".$question->topic->topic_name."\"");
        return redirect($request->previousUri);
    }

    /**
     * Получает данные из $request и $id
     * Проверяет условие и готовит переменную для ответа
     * Записывает данные в базу
     * Формирует сообщения в Session
     * пишет Log
     * перенаправляет на предидущую страницу
     */
    public function changeStatus(Request $request, $id)
    {
        $question = Question::findOrFail($id);
        if ($question->status_id == 2){
            $statusname = 'скрыт';
        } elseif ($question->status_id == 3){
            $statusname = 'опубликован';
        } else {
            $statusname = 'ожидает ответа';
        }
        $input = $request->all();
        $question->fill($input)->save();
        Session::flash('flash_message', "Статус вопроса \"$question->question\" изменён на \"$statusname\"");
        Log::info(Auth::user()->name." изменил видимость вопроса ($question->id) \"$question->question\" на \"$statusname\" в теме \"".$question->topic->topic_name."\"");
        return redirect()->back();
    }

    /**
     * Получает данные из $id
     * Удаляет полученные данные из базы
     * Формирует сообщения в Session
     * пишет Log
     * перенаправляет на предидущую страницу
     */
    public function destroy($id)
    {
        $question = Question::findOrFail($id);
        $question->delete();
        Session::flash('flash_message', "Вопрос \"$question->question\" успешно удалён!");
        Log::info(Auth::user()->name." удалил вопрос ($question->id) \"$question->question\" из темы \"".$question->topic->topic_name.'"');
        return redirect()->back();
    }

}


