<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use DB;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class AdminsController extends Controller
{
    /*
     * Проверка авторизации перед вызовом метода
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Получаем список пользователей с пагинацией
     * передаёт данные в шаблон
     */
    public function index()
    {
        $admins = User::paginate(10);
        return view('admin.admins.index', compact('admins'));
    }

    /**
     * Открывает шаблон
     */
    public function create()
    {
        return view('admin.admins.create');
    }

    /**
     * Получает данные из $request
     * Проверят нужные поля
     * Готовит и записывает данные из request в базу
     * 
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required|unique:users|max:100']);
        $admin = User::create(['name' => $request['name'],
            'password' => bcrypt($request['password_confirmation']),
            'remember_token' => Str::random(60)]);
        $admin;
        Session::flash('flash_message', "Пользователь \"$admin->name\" успешно создан!");
        Log::info(Auth::user()->name." создал пользователя: \"$admin->name\"");
        return redirect('/admin/admins');
        
    }

    /**
     * Получает данные из $id
     * Получает пользователя по id
     * Перенаправляет данные в шаблон
     */
    public function edit($id)
    {
        $admin = User::findOrFail($id);
        return view('admin.admins.edit', compact('admin'));
    }

    /**
     * Получает данные из $request
     * Проверят указанные данные с параметрами валидации
     * Записывает в базу
     * Формирует сообщения в Session
     * Пишет Log
     * Перенаправляет в шаблон
     * @param  \Illuminate\Http\Request  $request
     */
    public function update(Request $request, $id)
    {
        $admin = User::findOrFail($id);
        $input = (['name' => $request['name'],
            'password' => bcrypt($request['password_confirmation']),
            'remember_token' => Str::random(60),
            '_method' => $request['_method'],
            '_token' => $request['_token']
            ]);
        $admin->fill($input)->save();
        Session::flash('flash_message', "Пароль для пользователя: \"$admin->name\" успешно изменён!");
        Log::info(Auth::user()->name." сменил пароль для пользователя: \"$admin->name\"");
        return redirect('/admin/admins');
    }

    /**
     * Получает данные из $id
     * Получает пользователя по id
     * Удаляёт найденную запись
     * Формирует сообщения в Session
     * Пишет Log
     * Перенаправляет по указанному пути
     */
    public function destroy($id)
    {
        $admin = User::findOrFail($id);
        $admin->delete();
        Session::flash('flash_message', "Пользователь \"$admin->name\" успешно удалён!");
        Log::info(Auth::user()->name." удалил пользователя: \"$admin->name\"");
        return redirect('/admin/admins');
    }
}
