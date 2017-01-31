<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Topic;
use Illuminate\Support\Facades\Session;


class HomeController extends Controller
{
    /**
     * Получаем список вопросов Тем
     * Передаёт полученныеданные в faq
     */
    public function index()
    {
        $questions = Question::all();;
        $topics = Topic::all();;
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
        $topics = Topic::all();
        return view('ask', compact('topics'));
    }

    /**
     * Получает данные из $request
     * Проверяте указанные поля
     * Формирует сообщения в Session
     * Сохранятет данные в базе
     * Переадресовывает на страницу
     */
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