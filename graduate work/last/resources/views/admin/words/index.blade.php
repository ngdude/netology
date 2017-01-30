@extends('layouts.app')

@section('content')
    <div class="center-block">
        <a href="{{ route('words.create') }}" class="btn btn-primary">Добавить запрещённое слово</a>
    </div>
    <div class="center-block">
        <table class="table">
            <thead>
                <tr>
                    <th>Слово</th>
                    <th>Дата Создания</th>
                   <th></th>
                   </tr>
                   </thead>
            <tbody>
            @foreach($words as $word)
            <tr>
                    <td>{{ $word->name }}</td>
                    <td>{{ $word->created_at }}</td>
                    <td></td>
                    <td>
                        <form method="POST" action="{{ route('words.destroy', $word->id) }}">
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
<div class="container">
    <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-3">
        </div>
        <div class="center-block col-md-6">
        {{ $words->links() }}
        </div>
    </div>
</div>
@endsection
