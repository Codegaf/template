@extends('layouts.default')

@section('styles')
    <link href="{{ asset('assets/vendor/datatables/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/vendor/datatables/css/responsive/responsive.bootstrap4.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/vendor/bootstrap-select/css/bootstrap-select.min.css') }}" rel="stylesheet"/>
    <style>
        div.dataTables_wrapper div.dataTables_info {
            white-space: normal;
        }
    </style>
@endsection

@section('content')
    <div class="main-content">
        <div class="card">
            <h4 class="card-title">{{ __('Usuarios') }}</h4>

            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-12">
                        <a href="{{ route('user.create') }}" class="btn btn-info float-right url_imodal" data-title="Nuevo Usuario" data-ico="fa fa-user">{{ __('Nuevo') }}</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <table id="users-table" class="table table-bordered">
                            <thead>
                            <tr>
                                <th>{{ __('Nombre') }}</th>
                                <th>{{ __('Email') }}</th>
                                <th>{{ __('Acciones') }}</th>
                            </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables/js/responsive/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables/js/responsive/responsive.bootstrap4.min.js') }}"></script>

    <script>
        let oTable = null;

        oTable = $('#users-table').DataTable({
            language: {
                url: 'assets/vendor/datatables/languages/Spanish.json'
            },
            responsive: true,
            serverSide: true,
            processing: true,
            ajax: {
                type: 'POST',
                url: '{{route('user.list')}}',
                data: function (d) {
                }
            },
            columns: [
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' },
                { data: 'actions', name: 'actions', sortable: false, responsivePriority: 1 }
            ]
        });

    </script>
@endsection
