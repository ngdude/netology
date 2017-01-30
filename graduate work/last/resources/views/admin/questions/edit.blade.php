@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('questions.update', $question->id) }}">
        <div class="form-group">
            <label for="topic_name">Имя:</label>
            <input type="topic_name" class="form-control" id="name" value="{{$question->name}}" name="name">
            <input type="hidden" name="previousUri" value="{{url()->previous()}}"/>
        </div>
        <div class="form-group">
            <label for="topic_name">Почта:</label>
            <input type="topic_name" class="form-control" id="email" value="{{$question->email}}" name="email">
        </div>
        <div class="form-group">
            <label for="topic_name">Тема вопроса: </label>
            <select name="topic_id" class="form-control">
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
            @if(($question->status_id) == 1)
                <label for="topic_name">Вопрос ожидает ответа: </label>
                <input type="hidden" name="status_id" value="1">
            @else
                <label for="topic_name">Настройка араметров отображения: </label>
                <select name="status_id" class="form-control">
                    @if(($question->status_id) == 2)
                        <option selected='selected' value="2">Показывать вопрос</option>
                        <option value="3">Скрывать вопрос</option>
                    @else
                        <option value="2">Показывать вопрос</option>
                        <option selected='selected' value="3">Скрывать вопрос</option>
                    @endif
                </select>
            @endif
        </div>
        <div class="form-group">
            <label for="topic_name">Вопрос:</label>
            <input type="topic_name" class="form-control" id="topic_name" value="{{$question->question}}"
                   name="question">
        </div>
        @if(($question->status_id) == 1)
            <input type="hidden" name="answer" value="">
        @else
            <div class="form-group">
                <label for="answer">Ответ:</label>
                <textarea class="form-control" rows="8" id="comment" name="answer">{{$question->answer}}</textarea>
            </div>
        @endif
        <a href="{{ route('questions.index') }}" id="cancel" name="cancel" class="btn btn-default">Отмена</button></a>
        <button type="submit" class="btn btn-default">Сохранить</button>
        {{ method_field('PUT') }}
        {{ csrf_field() }}
    </form>

@endsection

