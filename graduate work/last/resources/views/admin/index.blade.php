@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <ul class="nav nav-pills nav-stacked">
                        <li class="active"><a href="{{ route('home.index') }}"><i class="fa fa-home fa-fw"></i>Общая Информация</a></li>
                        <li><a href="{{ route('admins.index') }}"><i class="fa fa-file-o fa-fw"></i>Пользователи</a></li>
                        <li><a href="{{ route('topics.index') }}"><i class="fa fa-bar-chart-o fa-fw"></i>Темы</a></li>
                        <li><a href="{{ route('questions.index') }}"><i class="fa fa-table fa-fw"></i>Вопросы</a></li>
                        <li><a href="{{ route('logs.index') }}"><i class="fa fa-table fa-fw"></i>Логи</a></li>
                    </ul>
                </div>
                <div class="col-md-9 well">

                </div>
            </div>
        <div class="row">
            <div class="col-md4 col-md-offset-4">

            </div>
        </div>
    </div>
</div>

@endsection
