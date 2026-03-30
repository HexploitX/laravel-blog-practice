@extends('admin.layouts.main')

@section('content')
<!--begin::Container-->
<div class="container-fluid">
    <!--begin::Row-->
    <div class="row">
        <div class="col-auto">
            <a href="{{ route('admin.categories.create') }}" class="btn btn-primary mb-2">Добавить</a>
        </div>
    </div>
    <div class="row">
        <div class="col-auto">
            categories
        </div>
    </div>
    <!--end::Row-->
</div>
<!--end::Container-->
@endsection
