@extends('layouts.app')

@section('content')

    <div class="center-block">
        <a href="{{ route('admins.create') }}" class="btn btn-primary">Создать администратора</a>
    </div>
    <div class="center-block">
        <table class="table">
            <thead>
            <tr>
                <th>Имя Администратора</th>
                <th>Дата Создания</th>
                <th>Дата Изменения</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($admins as $admin)
                <tr>
                    <td>{{ $admin->name }}</td>
                    <td>{{ $admin->created_at }}</td>
                    <td>{{ $admin->updated_at }}</td>
                    <td><a href="{{ route('admins.edit', $admin->id) }}" class="btn btn-primary">Сменить пароль</a></td>
                    <td>
                        @if(count($admins) == 1)
                            <form>
                                <button type="submit" class="btn btn-danger disabled">Удалить</button>
                                @else
                                    <form method="POST" action="{{ route('admins.destroy', $admin->id) }}">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger">Удалить</button>
                                        @endif
                                    </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    </div>
    <div class="row">
        <div class="col-md4 col-md-offset-4">
            {{ $admins->links() }}
        </div>
    </div>


@endsection
