<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Topic;
use Illuminate\Support\Facades\Session;
use App\Http\Traits\GetWords;

class HomeController extends Controller
{
    /**
     * Добавляем трейт для проверки слов
     */
    use GetWords;
    /**
     * Получаем список вопросов Тем
     * Передаёт полученные данные в faq
     */
    public function index()
    {
        $questions = Question::all();
        $topics = Topic::all();
        return view('faq')->with(['questions' => $questions,
            'topics' => $topics
        ]);
    }

    /**
     * Делает запрос к базам
     * Передаёт полученные данные в шаблон ask
     */
    public function ask()
    {
        //dump($this->anotherMethod($request));
        $topics = Topic::all();
        return view('ask', compact('topics'));
    }
    
    /**
     * Получает данные из $request
     * Проверят указанные поля
     * Проверяет наличие запрещённых слов 
     * Формирует сообщения в Session
     * Сохраняет данные в базе
     * Переадресовывает на страницу
     */
    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required|max:100',
            'email' => 'required|email|max:100',
            'topic_id' => 'required',
            'question' => 'required'
        ]);
        $data = $request->all();
        $question = $data['question'];
        if (($this->checkWords($question)) != false) {
            $request->request->add(['status_id' => 4]);
        }
        Question::create($request->all());
        Session::flash('flash_message', 'Вопрост добавлен!');
        return redirect('/ask');
    }

    /**
     * Проверят авторизацию
     * если успешно
     * переадресовывает на admin.index
     */
    public function indexAdmin()
    {
        $this->middleware('auth');
        return view('admin.index');
    }
}