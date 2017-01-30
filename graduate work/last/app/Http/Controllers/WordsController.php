<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Word;
use Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class WordsController extends Controller
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
     * Передаёт полученныеданные в шаблон words.index
     */
    public function index()
    {
        $words = Word::paginate(9);
        return view('admin.words.index')->with(['words' => $words]);
    }

    /**
     * Открывает страницу
     * шаблон words.create
     */
    public function create()
    {
        return view('admin.words.create');
    }

    /**
     * Получает данные и $request
     * проерят поле по указанным нараметрам
     * формирует сообщения в Session
     * пишет Log
     * и перенаправляет на указанную страницу
     */
    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required|unique:words|max:100']);
        $words = Word::create($request->all());
        $words;
        Session::flash('flash_message', "Запрещённое слово \"$words->name\" успешно добавлено!");
        Log::info(Auth::user()->name . " добавил запрещённое слово: \"$words->name\"");
        return redirect('/admin/words');

    }

    /**
     * Получает данные и $id и $request
     * делает апрос к базе по параметру $id
     * удаляет найденую запись
     * Формирует сообщения в Session
     * пишет Log
     * и перенаправляет на указанную страницу
     */
    public function destroy($id, Request $request)
    {
        $word = Word::findOrFail($id);
        $word->delete();
        Session::flash('flash_message', "Слово \"$word->name\" удалено!");
        Log::info(Auth::user()->name . " удалил слово: \"$word->name\"");
        return redirect('/admin/words');
    }
}
