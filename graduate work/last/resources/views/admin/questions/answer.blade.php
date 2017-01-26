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
                    <form method="POST" action="{{ route('answer.update', $question->id) }}">
                        <div class="form-group">
                            <label for="comment">Введите ответ на вопрос: {{ $question->question }}</label>
                            <textarea class="form-control" rows="8" id="comment" name="answer"></textarea>
                            <input type="hidden" name="question_id" value="{{ $question->id }}" />
                            <input type="hidden" name="status" value="1" />
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
