@extends('layouts.app')

@section('content')

    <form method="POST" action="{{ route('admins.update', $admin->id)  }}">
        <div class="form-group">
            <input type="hidden" name="name" value="{{ $admin->name }}">
            <label type="topic_name">Введите новый пароль для администратора: {{ $admin->name }}</label>
            <input type="topic_name" class="form-control" id="password_confirmation" name="password_confirmation"
                   value="">
        </div>
        <a href="{{ route('admins.index') }}" id="cancel" name="cancel" class="btn btn-default">Отмена</button></a>
        <button type="submit" class="btn btn-default">Сохранить</button>
        {{ method_field('PUT') }}
        {{ csrf_field() }}
    </form>

@endsection
