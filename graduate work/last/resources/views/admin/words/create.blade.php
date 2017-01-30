@extends('layouts.app')

@section('content')

    <form method="POST" action="{{ route('words.index') }}">
        <div class="form-group">
            <label for="name">Введите запрещённое слово:</label>
            <input type="name" class="form-control" id="name" name="name">
        </div>
        <a href="{{ route('words.index') }}" id="cancel" name="cancel" class="btn btn-default">Отмена</a>
        <button type="submit" class="btn btn-default">Создать</button>
        {{ csrf_field() }}
    </form>


    <div class="container">
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-3">
            </div>
            <div class="center-block col-md-6">
        </div>
    </div>
    </div>
@endsection
