@extends('admin.layouts.main')

@section('content')
<!--begin::Container-->
<div class="container-fluid">
    <!--begin::Row-->
    <div class="row mb-3">
        <div class="col-auto">
            <h2>Добавление категории</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card card-primary card-outline mb-4">
                <!--begin::Form-->
                <form action="{{ route('admin.categories.store') }}" method="POST">
                    @csrf
                    <!--begin::Body-->
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="title" class="form-label">Название</label>
                            <input name="title" type="text" class="form-control" id="title">
                            @error('title')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <!--end::Body-->
                    <!--begin::Footer-->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Добавить</button>
                    </div>
                    <!--end::Footer-->
                </form>
                <!--end::Form-->
            </div>
        </div>
    </div>
    <!--end::Row-->
</div>
<!--end::Container-->
@endsection
