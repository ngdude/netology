@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="container">
        <div class="row">
                <div class="col-md-3">
                    <ul class="nav nav-pills nav-stacked">
                        <li><a href="{{ route('home.index') }}"><i class="fa fa-home fa-fw"></i>Общая Информация</a></li>
                        <li><a href="{{ route('admins.index') }}"><i class="fa fa-file-o fa-fw"></i>Пользователи</a></li>
                        <li class="active"><a href="{{ route('topics.index') }}"><i class="fa fa-bar-chart-o fa-fw"></i>Темы</a></li>
                        <li><a href="{{ route('questions.index') }}"><i class="fa fa-table fa-fw"></i>Вопросы</a></li>
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
                        <a href="{{ route('topics.create') }}" class="btn btn-primary">Создать тему</a>
                    </div>
                    <div class="center-block">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Имя Темы</th>
                                <th>Всего Вопросов</th>
                                <th>Ожидают ответа</th>
                                <th>Опубликовано</th>
                                <th>Скрыто</th>
                                <th>Дата Создания</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                    <tbody>
                    @foreach($topics as $topic)
                            <tr>
                                <td>{{ $topic->topic_name }}</td>
                                <td>{{ count($topic->getQuestions) }}</td>
                                <td>{{ count($topic->getQuestions->where('status_id', 1)) }}</td>
                                <td>{{ count($topic->getQuestions->where('status_id', 2)) }}</td>
                                <td>{{ count($topic->getQuestions->where('status_id', 3)) }}</td>
                                <td>{{ $topic->created_at }}</td>
                                <td><a href="{{ route('topics.edit', $topic->id) }}" class="btn btn-primary">Редактировать</a></td>
                                <td>
                                    <form method="POST" action="{{ route('topics.destroy', $topic->id) }}""\>

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
               {{ $topics->links() }}
            </div>
        </div>
    </div>
</div>

@endsection
