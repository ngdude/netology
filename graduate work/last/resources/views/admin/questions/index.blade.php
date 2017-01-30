@extends('layouts.app')

@section('content')

    <div class="center-block">
        <a href="{{ route('questions.create') }}" class="btn btn-primary">Создать вопрос</a>
        <a href="{{ route('questions.index') }}" class="btn btn-info @if(Request::is('admin/questions')) active @endif">Все
            вопросы</a>
        <a href="{{ route('questions.index.status', 'waitting' ) }}"
           class="btn btn-info @if(Request::is('admin/questions/index/waitting')) active @endif">не отвеченные</a>
        <a href="{{ route('questions.index.status', 'shown' ) }}"
           class="btn btn-info @if(Request::is('admin/questions/index/shown')) active @endif">опубликованные</a>
        <a href="{{ route('questions.index.status', 'hidden' ) }}"
           class="btn btn-info @if(Request::is('admin/questions/index/hidden')) active @endif">скрытые</a>
    </div>
    <div class="center-block">
        <table class="table">
            <thead>
            <tr>
                <th>Тема</th>
                <th>Вопрос</th>
                <th>Статус</th>
                <th>Дата Создания</th>
                <th>Дата Изменения</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($questions as $question)
                <tr>
                    @if ($question->status_id != 4)
                        <td>{{ $question->topic->topic_name }}</td>
                        <td>{{ $question->question }}</td>
                        <td>{{ $question->status->name }}</td>
                        <td>{{ $question->created_at }}</td>
                        <td>{{ $question->updated_at }}</td>
                        <td>
                            @if(($question->status_id) == 1)
                                <a href="{{ route('questions.answer', $question->id) }}"
                                   class="btn btn-primary  btn-sm">Ответить</a>
                            @else
                                <form method="POST" action="{{ route('status.change', $question->id) }}">
                                    <input type="hidden" name="status_id"
                                           value="{{( ($question->status_id == 2) ? '3' : '2') }}">
                                    {{ method_field('PUT') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger  btn-sm">Именить статус</button>
                                </form>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('questions.edit', $question->id) }}" class="btn btn-primary  btn-sm">Редактировать</a>
                        </td>
                        <td>
                            <form method="POST" action="{{ route('questions.destroy', $question->id) }}">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger  btn-sm">Удалить</button>
                            </form>
                        </td>
                    @endif
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
                {{ $questions->links() }}
            </div>
        </div>
    </div>
@endsection
