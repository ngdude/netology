@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <ul class="nav nav-pills nav-stacked">
                    <li><a href="{{ route('home.index') }}"><i class="fa fa-home fa-fw"></i>Общая Информация</a></li>
                    <li><a href="{{ route('admins.index') }}"><i class="fa fa-file-o fa-fw"></i>Пользователи</a></li>
                    <li><a href="{{ route('topics.index') }}"><i class="fa fa-bar-chart-o fa-fw"></i>Темы</a></li>
                    <li><a href="{{ route('questions.index') }}"><i class="fa fa-table fa-fw"></i>Вопросы</a></li>
                    <li class="active"><a href="{{ route('words.index') }}"><i class="fa fa-table fa-fw"></i>Запрещённые слова</a></li>
                </ul>
            </div>
            <div class="col-md-10 well">
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
                    <form method="POST" action="{{ route('topics.update', $topic->id) }}">
                        <div class="form-group">
                            <label for="topic_name">Измените название темы:</label>
                            <input type="topic_name" class="form-control" id="topic_name" value="{{$topic->topic_name}}" name="topic_name">
                        </div>
                        <a href="{{ route('topics.index') }}" id="cancel" name="cancel" class="btn btn-default">Отмена</button></a>
                        <button type="submit" class="btn btn-default">Сохранить</button>
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-3">
                    </div>
                    <div class="center-block col-md-6"">
                </div>
            </div>
        </div>
@endsection
