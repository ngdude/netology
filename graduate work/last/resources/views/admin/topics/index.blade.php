@extends('layouts.app')

@section('content')

    <div class="center-block">
        <a href="{{ route('topics.create') }}" class="btn btn-primary">Создать тему</a>
    </div>
    <div class="center-block">
        <table class="table">
            <thead>
            <tr>
                <th>Имя Темы</th>
                <th>Всего Вопросов</th>
                <th>Ожидают ответа</th>
                <th>Опубликовано</th>
                <th>Скрыто</th>
                <th>Дата Создания</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($topics as $topic)
                <tr>
                    <td>{{ $topic->topic_name }}</td>
                    <td>{{ count($topic->getQuestions) }}</td>
                    <td>{{ count($topic->getQuestions->where('status_id', 1)) }}</td>
                    <td>{{ count($topic->getQuestions->where('status_id', 2)) }}</td>
                    <td>{{ count($topic->getQuestions->where('status_id', 3)) }}</td>
                    <td>{{ $topic->created_at }}</td>
                    <td><a href="{{ route('topics.edit', $topic->id) }}" class="btn btn-primary">Редактировать</a></td>
                    <td>
                        <form method="POST" action="{{ route('topics.destroy', $topic->id) }}">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-3">
            </div>
            <div class="center-block col-md-6">
                {{ $topics->links() }}
            </div>
        </div>
    </div>
@endsection
