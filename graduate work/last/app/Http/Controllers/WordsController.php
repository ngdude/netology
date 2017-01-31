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
     * Получает список слов (ответ с пагинацией 9)
     * Передаёт полученные данные в шаблон words.index
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
     * Проерят поле по указанным нараметрам
     * Формирует сообщения в Session
     * Пишет Log
     * Перенаправляет на указанную страницу
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
     * Получает слово по  $id
     * Удаляет найденную запись
     * Формирует сообщения в Session
     * Пишет Log
     * Перенаправляет на указанную страницу
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
