@extends('admin.layouts.main')

@section('content')
<!--begin::Container-->
<div class="container-fluid">
    <!--begin::Row-->
    <div class="row mb-3">
        <div class="col-auto">
            <h2>Редактирование поста</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card card-primary card-outline mb-4">
                <!--begin::Form-->
                <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <!--begin::Body-->
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="title" class="form-label">Название</label>
                            <input
                                name="title"
                                value="{{ $post->title }}"
                                type="text"
                                class="form-control"
                                id="title">
                            @error('title')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="summernote" class="form-label">Текст</label>
                            <textarea id="summernote" name="content">{{ $post->content }}</textarea>
                            @error('content')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Добавить превью</label>
                            <div class="w-50 mb-3">
                                <img class="w-100" src="{{ url('storage/' . $post->preview_image) }}" alt="preview_img"/>
                            </div>
                            <div class="input-group w-50">
                                <input type="file" class="form-control" id="imagePreview" name="preview_image">
                                <label class="input-group-text" for="imagePreview">Загрузить</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Добавить главное изображение</label>
                            <div class="w-50 mb-3">
                                <img class="w-100" src="{{ url('storage/' . $post->main_image) }}" alt="main_image"/>
                            </div>
                            <div class="input-group w-50">
                                <input type="file" class="form-control" id="imagePreview" name="main_image">
                                <label class="input-group-text" for="imagePreview">Загрузить</label>
                            </div>
                        </div>
                        <div class="mb-3 w-50">
                            <label for="category" class="form-label">Выберите категорию</label>
                            <select name="category_id" class="form-select" id="category" required="">
                                @foreach($categories as $category)
                                    <option
                                        {{ $category->id == $post->category_id ? 'selected' : '' }}
                                        value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 w-50">
                            <div class="form-group">
                                <label>Теги</label>
                                <select name="tag_ids[]" class="select2" multiple="multiple" data-placeholder="Выберите теги" style="width: 100%;">
                                    @foreach($tags as $tag)
                                        <option
                                            {{ is_array($post->tags->pluck('id')->toArray()) &&
                                                in_array($tag->id, $post->tags->pluck('id')->toArray()) ? 'selected' : '' }}
                                            value="{{ $tag->id }}">{{ $tag->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
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
