@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <ul class="nav nav-pills nav-stacked">
                        <li><a href="{{ route('home.index') }}"><i class="fa fa-home fa-fw"></i>Общая Информация</a></li>
                        <li><a href="{{ route('admins.index') }}"><i class="fa fa-file-o fa-fw"></i>Пользователи</a></li>
                        <li><a href="{{ route('topics.index') }}"><i class="fa fa-bar-chart-o fa-fw"></i>Темы</a></li>
                        <li class="active"><a href="{{ route('questions.index') }}"><i class="fa fa-table fa-fw"></i>Вопросы</a></li>
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
                        <a href="{{ route('questions.create') }}" class="btn btn-primary">Создать вопрос</a>
                    </div>
                    <div class="center-block">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Номер Темы</th>
                                <th>Вопрос</th>
                                <th>Статус</th>
                                <th>Дата Создания</th>
                                <th>Дата Изменения</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                    <tbody>
                    @foreach($questions as $question)
                            <tr>
                                <td>{{ $question->topic_id }}</td>
                                <td>{{ $question->question }}</td>
                                <td>
                                    @if(($question->status) == 0)
                                    <a href="{{ route('questions.answer', $question->id) }}">ожидает ответа</a>
                                    @elseif(($question->status) == 1)
                                        опубликован
                                    @elseif(($question->status) == 2)
                                        скрыт
                                    @else
                                        не известный
                                    @endif
                                    </td>
                                <td>{{ $question->created_at }}</td>
                                <td>{{ $question->updated_at }}</td>
                                <td><a href="{{ route('questions.edit', $question->id) }}" class="btn btn-primary">Редактировать</a></td>
                                <td>
                                    <form method="POST" action="{{ route('questions.destroy', $question->id) }}">
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
               {{ $questions->links() }}
            </div>
        </div>
    </div>
</div>

@endsection