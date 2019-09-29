@extends('admin.layout')

@section('content')
    <section class="content-header">
        <h1>Список пользователей</h1>
    </section>
    <section class="content">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Ф.И.О</th>
                            <th>Дата регистрации</th>
                            <th>Количество ЭЦП</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->getFullName() }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td>{{ $user->count_keys() }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
