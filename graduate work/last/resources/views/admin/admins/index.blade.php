@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <ul class="nav nav-pills nav-stacked">
                        <li><a href="{{ route('home.index') }}"><i class="fa fa-home fa-fw"></i>Общая Информация</a></li>
                        <li class="active"><a href="{{ route('admins.index') }}"><i class="fa fa-file-o fa-fw"></i>Пользователи</a></li>
                        <li><a href="{{ route('topics.index') }}"><i class="fa fa-bar-chart-o fa-fw"></i>Темы</a></li>
                        <li><a href="{{ route('questions.index') }}"><i class="fa fa-table fa-fw"></i>Вопросы</a></li>
                        <li><a href="{{ route('logs.index') }}"><i class="fa fa-table fa-fw"></i>Логи</a></li>
                    </ul>
                </div>
                <div class="col-md-9 well">
                    @if(Session::has('flash_message'))
                        <div class="alert alert-success">
                            {{ Session::get('flash_message') }}
                        </div>
                    @endif
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="center-block">
                        <a href="{{ route('admins.create') }}" class="btn btn-primary">Создать администратора</a>
                    </div>
                    <div class="center-block">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Имя Администратора</th>
                                <th>Дата Создания</th>
                                <th>Дата Изменения</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                    <tbody>
                    @foreach($admins as $admin)
                            <tr>
                                <td>{{ $admin->name }}</td>
                                <td>{{ $admin->created_at }}</td>
                                <td>{{ $admin->updated_at }}</td>
                                <td><a href="{{ route('admins.edit', $admin->id) }}" class="btn btn-primary">Сменить пароль</a></td>
                                <td>
                                    <form method="POST" action="{{ route('admins.destroy', $admin->id) }}">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger">Удалить</button>
                                    </form>
                                </td>
                            </tr>
                    @endforeach
                    </tbody>
                    </table>
                    </div>
            </div>
        <div class="row">
            <div class="col-md4 col-md-offset-4">
               {{ $admins->links() }}
            </div>
        </div>
    </div>
</div>

@endsection
