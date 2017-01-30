@extends('layouts.app')

@section('content')

    <form method="POST" action="{{ route('admins.store') }}">
        <div class="form-group">
            <label for="topic_name">Администратор:</label>
            <input type="topic_name" class="form-control" id="name" name="name">
            <label type="topic_name">Пароль:</label>
            <input type="topic_name" class="form-control" id="password_confirmation" name="password_confirmation">
        </div>
        <a href="{{ route('admins.index') }}" id="cancel" name="cancel" class="btn btn-default">Отмена</button></a>
        <button type="submit" class="btn btn-default">Создать</button>
        {{ csrf_field() }}
    </form>

@endsection
