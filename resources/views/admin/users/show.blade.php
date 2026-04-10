@extends('admin.layouts.main')

@section('content')
<!--begin::Container-->
<div class="container-fluid">
    <!--begin::Row-->
    <div class="row mb-3">
        <div class="col-auto">
            <a href="{{ route('admin.users.create') }}" class="btn btn-primary mb-2">Добавить</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h3 class="card-title">Пользователь</h3>
                    <a style="margin-left: 5px;" class="d-inline-flex text-decoration-none text-success" href="{{ route('admin.users.edit', $user->id) }}">
                        <i class="fa-regular fa-pen-to-square"></i>
                    </a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered" role="table">
                        <tbody>
                            <tr class="align-middle">
                                <td>ID</td>
                                <td>{{ $user->id }}</td>
                            </tr>
                            <tr class="align-middle">
                                <td>Имя пользователя</td>
                                <td>{{ $user->name }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-end">
                        <li class="page-item">
                            <a class="page-link" href="#">«</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">1</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">3</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">»</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--end::Row-->
</div>
<!--end::Container-->
@endsection
