@extends('admin.layouts.main')

@section('content')
<!--begin::Container-->
<div class="container-fluid">
    <!--begin::Row-->
    <div class="row mb-3">
        <div class="col-auto">
            <a href="{{ route('admin.categories.create') }}" class="btn btn-primary mb-2">Добавить</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h3 class="card-title">Категории</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered" role="table">
                        <thead>
                        <tr>
                            <th style="width: 10px" scope="col">ID</th>
                            <th scope="col">Название</th>
                            <th scope="col">Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr class="align-middle">
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->title }}</td>
                                <td class="d-flex align-items-center">
                                    <a class="d-inline-flex text-decoration-none"
                                       style="margin-right: 10px"
                                       href="{{ route('admin.categories.show', $category->id) }}">
                                        <i class="fa-regular fa-eye"></i>
                                    </a>
                                    <a class="d-inline-flex text-decoration-none text-success"
                                       style="margin-right: 10px"
                                       href="{{ route('admin.categories.edit', $category->id) }}">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </a>
                                    <form action="{{ route('admin.categories.delete', $category->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-danger border-0 bg-transparent">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
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
