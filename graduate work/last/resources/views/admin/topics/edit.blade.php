@extends('layouts.app')

@section('content')

    <div class="center-block">
        <form method="POST" action="{{ route('topics.update', $topic->id) }}">
            <div class="form-group">
                <label for="topic_name">Измените название темы:</label>
                <input type="topic_name" class="form-control" id="topic_name" value="{{$topic->topic_name}}"
                       name="topic_name">
            </div>
            <a href="{{ route('topics.index') }}" id="cancel" name="cancel" class="btn btn-default">Отмена</button></a>
            <button type="submit" class="btn btn-default">Сохранить</button>
            {{ method_field('PUT') }}
            {{ csrf_field() }}
        </form>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-3">
            </div>
            <div class="center-block col-md-6"
            ">
        </div>
    </div>
    
@endsection
