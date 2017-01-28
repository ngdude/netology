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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    //public function setPasswordAttribute($value){
    //    $this->attributes['password'] = bcrypt($value);
    //}

    public function index()
    {
        $admins = User::paginate(10);
        return view('admin.admins.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.admins.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required|unique:users|max:100']);
        $admin = User::create(['name' => $request['name'],
            'password' => bcrypt($request['password_confirmation']),
            'remember_token' => Str::random(60)]);
        $admin;
        Session::flash('flash_message', "Пользователь ".$admin->name." успешно создан!");
        Log::info(Auth::user()->name." создал пользователя: $admin->name");
        return redirect('/admin/admins');
        
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
        $admin = User::findOrFail($id);
        return view('admin.admins.edit', compact('admin'));
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
        $admin = User::findOrFail($id);
        //$input1 = $request->all();
        $input = (['name' => $request['name'],
            'password' => bcrypt($request['password_confirmation']),
            'remember_token' => Str::random(60),
            '_method' => $request['_method'],
            '_token' => $request['_token']
            ]);
        $admin->fill($input)->save();
        Session::flash('flash_message', "Пароль для пользователя: $admin->name успешно изменён!");
        Log::info(Auth::user()->name." сменил пароль для пользователя: $admin->name");
        return redirect('/admin/admins');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $admin = User::findOrFail($id);
        $admin->delete();
        Session::flash('flash_message', "Пользователь ".$admin->name." успешно удалён!");
        Log::info(Auth::user()->name." удалил пользователя: $admin->name");
        return redirect('/admin/admins');
    }
}
