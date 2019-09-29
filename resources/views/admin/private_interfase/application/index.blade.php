@extends('admin.layout')

@section('content')
    <section class="content-header">
        <h1>Список заявок в очереди</h1>
    </section>
    <section class="content">

        <div class="col-xs-12">
            <div class="box">
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Client_id</th>
                            <th>Серия документа</th>
                            <th>№ Документа</th>
                            <th>Изображение документа</th>
                            <th>Фото клиента</th>
                            <th>Действие</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(!empty($applications))
                            @foreach($applications as $application)
                                <tr class="app_row" data-application-id="{{ $application->id }}">
                                    <td>{{ $application->id }}</td>
                                    <td>{{ $application->client_id }}</td>
                                    <td>{{ $application->serial }}</td>
                                    <td>{{ $application->number }}</td>
                                    <td><img src="{{ $application->getPhotoDoc() }}" alt="no_photo" style="height: 100px; width: auto"></td>
                                    <td><img src="{{ $application->getPhotoClient() }}" alt="no_photo" style="height: 100px; width: auto"></td>
                                    <td>
                                        <div class="btn-group">
                                            <a class="btn btn-primary accept_application">Одобрить</a>
                                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                <span class="caret"></span>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu" style="min-width: 0">
                                                <li>
                                                    <button type="button" class="btn btn-danger show_answer">Отклонить</button>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </section>
    <div class="modal fade" id="show_answer">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Выберите причину отказа</h4>
                </div>
                <div class="modal-body">
                    <form id="reject_form" role="form" action="{{ route('admin.private.users.create') }}" data-app-id="">
                        <div class="form-group">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="reason_reject" value="option1" checked="Несоответствие личности с фотографией в паспорте">
                                    Несоответствие личности с фотографией в паспорте
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="reason_reject" value="Несоответствие паспортных данных при регистрации">
                                    Несоответствие паспортных данных при регистрации
                                </label>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary reject_application">Submit</button>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection
@section('js')
    @parent
    <script>
        $('.accept_application').click(function () {
            let _this = $(this);
            let app_row = _this.closest('tr.app_row');
            let post_data = {
                app_id: app_row.data('application-id'),
                _method: 'PUT'
            };
            var r = confirm("Вы подтверждаете одобрение?");
            if (r == true) {
                $.ajax({
                    data: post_data,
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    type: 'POST',
                    url: '{{ route('admin.private.applications.accept') }}'
                }).done(function () {
                    app_row.remove();
                }).fail(function (response) {
                    console.log(response);
                });
            }
        });
        $('.show_answer').click(function () {
            let _this = $(this);
            let app_row = _this.closest('tr.app_row');
            $('#reject_form').data('app-id', app_row.data('application-id'));
            $('#show_answer').modal('show');
        });
        $('.reject_application').click(function (e) {
            let form = $('#reject_form');
            var form_data = new FormData(form[0]);
            form_data.append('_method', 'PUT');
            form_data.append('app_id', form.data('app-id'));
            var r = confirm("Вы подтверждаете отказ?");
            if (r == true) {
                $.ajax({
                    data: form_data,
                    cache: false,
                    processData: false,
                    contentType: false,
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    type: 'POST',
                    url: '{{ route('admin.private.applications.reject') }}'
                }).done(function () {
                    location.reload();
                }).fail(function (response) {
                    console.log(response);
                });
            }
            e.preventDefault();
        });
    </script>
@endsection
