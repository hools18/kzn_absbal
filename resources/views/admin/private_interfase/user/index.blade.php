@extends('admin.layout')

@section('content')
    <section class="content-header">
        <h1>Список регистраторов</h1>
    </section>
    <section class="content">
        <div class="col-xs-12">
            <div class="btn-group">
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#create_reg">Добавить
                    регистратора
                </button>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Ф.И.О</th>
                            <th>Рабочее место</th>
                            <th>Номер подразделения</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->getFullName() }}</td>
                                <td>{{ $user->workplace }}</td>
                                <td>{{ $user->unit_number }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </section>
    <div class="modal fade" id="create_reg">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Создать аккаунт</h4>
                </div>
                <div class="modal-body">
                    <form role="form" action="{{ route('admin.private.users.create') }}" method="post">
                        <div class="form-group">
                            <label for="surnameId">Фамилия</label>
                            <input type="text" class="form-control" name="surname" id="surnameId" required>
                        </div>
                        <div class="form-group">
                            <label for="nameId">Имя</label>
                            <input type="text" class="form-control" name="name" id="nameId" required>
                        </div>
                        <div class="form-group">
                            <label for="patronymicId">Отчество</label>
                            <input type="text" class="form-control" name="patronymic" id="patronymicId">
                        </div>
                        <div class="form-group">
                            <label for="emailId">Email address</label>
                            <input type="email" class="form-control" name="email" id="emailId" required>
                        </div>
                        <div class="form-group">
                            <label for="phoneId">Номер телефона</label>
                            <input type="email" class="form-control" name="phone" id="phoneId" required>
                        </div>
                        <div class="form-group">
                            <label for="loginId">Логин</label>
                            <input type="text" class="form-control" name="login" id="loginId" required>
                        </div>
                        <div class="form-group">
                            <label for="passwordId">Пароль</label>
                            <input type="text" class="form-control" name="password" id="passwordId" required>
                        </div>
                        <div class="form-group">
                            <label for="birthdayId">Дата рождения</label>
                            <input type="text" class="form-control" id="birthdayId" name="birthday" required>
                        </div>
                        <div class="form-group">
                            <label for="workplaceId">Рабочее место</label>
                            <input type="text" class="form-control" id="workplaceId" name="workplace" required>
                        </div>
                        <div class="form-group">
                            <label for="unit_number">Номер подразделения</label>
                            <input type="text" class="form-control" name="unit_number" id="unit_number"  required>
                        </div>
                        <button type="submit" class="btn btn-primary button_send" style="display: none">Submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Закрыть</button>
                    <button type="button" class="btn btn-primary reg_button">Зарегистрировать</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
@endsection
@section('js')
    @parent
    <script type="text/javascript">
        $(function () {
            $('#birthdayId').datetimepicker({
                locale: 'ru',
                format: 'YYYY-MM-DD HH:mm:ss',
            });
        });
        $('.reg_button').click(function () {
            $('.button_send').click();
        })
    </script>
@endsection
