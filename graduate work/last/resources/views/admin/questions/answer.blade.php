@extends('layouts.app')

@section('content')

    <form method="POST" action="{{ route('answer.update', $question->id) }}">
        <div class="form-group">
            <label for="comment">Введите ответ на вопрос: {{ $question->question }}</label>
            <textarea class="form-control" rows="8" id="comment" name="answer"></textarea>
            <input type="hidden" name="question_id" value="{{ $question->id }}"/>
            <input type="hidden" name="status_id" value="2"/>
            <input type="hidden" name="previousUri" value="{{url()->previous()}}"/>
        </div>
        <a href="{{ route('questions.index') }}" id="cancel" name="cancel" class="btn btn-default">Отмена</button></a>
        <button type="submit" class="btn btn-default">Сохранить</button>
        {{ method_field('PUT') }}
        {{ csrf_field() }}
    </form>

@endsection

