@extends('admin.layouts.main')

@section('content')
<!--begin::Container-->
<div class="container-fluid">
    <!--begin::Row-->
    <div class="row mb-3">
        <div class="col-auto">
            <h2>Редактирование пользователя</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card card-primary card-outline mb-4">
                <!--begin::Form-->
                <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <!--begin::Body-->
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Название</label>
                            <input
                                name="name"
                                value="{{ $user->name }}"
                                type="text"
                                class="form-control"
                                id="name">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">E-mail</label>
                            <input
                                name="email"
                                value="{{ $user->email }}"
                                type="text"
                                class="form-control"
                                id="email">
                            @error('email')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 w-50">
                            <label for="role" class="form-label">Выберите права пользователя</label>
                            <select name="role" class="form-select" id="role" required="">
                                @foreach($roles as $id => $role)
                                    <option
                                        {{ $id == $user->role ? 'selected' : '' }}
                                        value="{{ $id }}">{{ $role }}</option>
                                @endforeach
                            </select>
                        </div>
                        <input type="hidden" name="user_id" value="{{ $user->id }}"/>
                    </div>
                    <!--end::Body-->
                    <!--begin::Footer-->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Обновить</button>
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
