@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('questions.index') }}">
        <div class="form-group">
            <label for="question">Введите вопрос:</label>
            <input type="question" class="form-control" name="question">
            <input type="hidden" name="previousUri" value="{{url()->previous()}}"/>
        </div>
        <div class="form-group">
            <label for="sel1">Выберите тему:</label>
            <select class="form-control" name="topic_id">
                @foreach($topics as $topic)
                    <option value="{{$topic->id}}">{{$topic->topic_name}}</option>
                @endforeach
            </select>
            <input type="hidden" name="name" value="{{Auth::user()->name}}"/>
            <input type="hidden" name="email" value="{{Auth::user()->name}}"/>
        </div>
        <a href="{{ route('questions.index') }}" id="cancel" name="cancel" class="btn btn-default">Отмена</button></a>
        <button type="submit" class="btn btn-default">Создать</button>
        {{ csrf_field() }}
    </form>

@endsection
