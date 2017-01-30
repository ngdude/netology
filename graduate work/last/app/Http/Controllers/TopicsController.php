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
    /*
     * Проверка авторизации перед вызовом метода
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Запрос к базе (ответ с пагинацией 9)
     * Передаёт полученные данные в шаблон
     */
    public function index()
    {
        $topics = Topic::paginate(9);
        return view('admin.topics.index', compact('topics'));
    }

    /**
     * Вызывает шаблон
     */
    public function create()
    {
        return view('admin.topics.create');
    }

    /**
     * Получает данные из $request
     * проверят указанные данные с параметрами валидации
     * записывает в базу
     * Формирует сообщения в Session
     * пишет Log
     * перенаправляет в шаблон
     * @param  \Illuminate\Http\Request $request
     */
    public function store(Request $request)
    {
        $this->validate($request, ['topic_name' => 'required|unique:topics|max:100']);
        $topic = Topic::create($request->all());
        $topic;
        Session::flash('flash_message', "Тема: \"$topic->topic_name\" успешно добавлена!");
        Log::info(Auth::user()->name . " добавил Тему: \"$topic->topic_name\"");
        return redirect('/admin/topics');
    }

    /**
     * Получает $id
     * Запрос к базе по id
     * Передаёт данные в шаблон
     */
    public function edit($id)
    {
        $topic = Topic::findOrFail($id);
        return view('admin.topics.edit', compact('topic'));
    }

    /**
     * Получает данные из $request и $id
     * Запрос к базе по id
     * проверят указанные данные с параметрами валидации
     * записывает в базу изменения
     * Формирует сообщения в Session
     * пишет Log
     * перенаправляет в шаблон
     * @param  \Illuminate\Http\Request $request
     */
    public function update(Request $request, $id)
    {
        $topic = Topic::findOrFail($id);
        $this->validate($request, ['topic_name' => 'required|unique:topics|max:100']);
        $input = $request->all();
        $topic->fill($input)->save();
        Session::flash('flash_message', "Тема: \"$topic->topic_name\" успешно изменена!");
        Log::info(Auth::user()->name . " Изменил Тему: \"$topic->topic_name\"");
        return redirect('/admin/topics');

    }

    /**
     * Получает данные из $request и $id
     * Запрос к базе по id
     * Запрос к другой базе и получение списка вопросов
     * с послед удалением всех найденных
     * Формирует сообщения в Session
     * пишет Log
     * перенаправляет в указанное место
     * @param  \Illuminate\Http\Request $request
     */
    public function destroy($id, Request $request)
    {
        $topic = Topic::findOrFail($id);
        $questionsAtTopic = $topic->getQuestions;
        foreach ($questionsAtTopic as $question) {
            $question->delete();
        }
        $topic->delete();
        Session::flash('flash_message', "Тема: \"$topic->topic_name\" и все вопросы в ней, успешно удалены!");
        Log::info(Auth::user()->name . " удалил Тему: \"$topic->topic_name\" и все вопросы в ней");
        return redirect('/admin/topics');
    }
}
