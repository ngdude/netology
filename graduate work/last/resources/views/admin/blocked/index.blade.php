@extends('layouts.app')

@section('content')

    <table class="table">
        <thead>
        <tr>
            <th>Тема</th>
            <th>Вопрос</th>
            <th>Статус</th>
            <th>Причина блокировки</th>
            <th>Дата Создания</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($questions as $question)
            <tr>
                <td>{{ $question->topic->topic_name }}</td>
                <td>{{ $question->question }}</td>
                <td>{{ $question->status->name }}</td>
                <td>
                    @foreach($blockedWords as $word)
                        @if ((mb_stripos($question->question,$word)) !== false)
                            {{ $wordsList[] = $word }}
                            @continue
                        @endif
                            <p class="bg-danger">Заблокированное слово больше не в списке запрещённых, жми на разблокировку!</p>
                    @endforeach
                </td>
                <td>{{ $question->created_at }}</td>
                <td>
                    <form method="POST" action="{{ route('status.change', $question->id) }}">
                        <input type="hidden" name="status_id" value="1">
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger  btn-sm">Разблокировать</button>
                    </form>                </td>
                <td>
                    <form method="POST" action="{{ route('questions.destroy', $question->id) }}">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger  btn-sm">Удалить</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>


    </div>
    </div>
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
@endsection
