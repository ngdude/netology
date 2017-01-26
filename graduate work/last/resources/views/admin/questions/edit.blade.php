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
                    <form method="POST" action="{{ route('questions.update', $question->id) }}">
                        <div class="form-group">
                            <label for="topic_name">Имя:</label>
                            <input type="topic_name" class="form-control" id="name" value="{{$question->name}}" name="name">
                        </div>
                        <div class="form-group">
                            <label for="topic_name">Почта:</label>
                            <input type="topic_name" class="form-control" id="email" value="{{$question->email}}" name="email">
                        </div>
                        <div class="form-group">
                            <label for="topic_name">Тема вопроса: </label>
                            <select name="topic_id"  class="form-control">
                                @foreach($topics as $topic)
                                    @if(($topic->id) == $question->topic_id)
                                    <option selected='selected' value="{{$topic->id}}">{{$topic->topic_name}}</option>
                                    @else
                                    <option value="{{$topic->id}}">{{$topic->topic_name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="topic_name">Настройка араметров отображения: </label>
                            <select name="status"  class="form-control">
                                @if(($question->status) == 1)
                                    <option selected='selected' value="1">Показывать вопрос</option>
                                    <option value="2">Скрывать вопрос</option>
                                @else
                                    <option value="1">Показывать вопрос</option>
                                    <option selected='selected' value="2">Скрывать вопрос</option>
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="topic_name">Вопрос:</label>
                            <input type="topic_name" class="form-control" id="topic_name" value="{{$question->question}}" name="question">
                        </div>
                        <a href="{{ route('questions.index') }}" id="cancel" name="cancel" class="btn btn-default">Отмена</button></a>
                        <button type="submit" class="btn btn-default">Сохранить</button>
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

