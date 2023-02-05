@extends('admin.layouts.main')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редагування поста</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Головна</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.post.index') }}">Пости</a></li>
                            <li class="breadcrumb-item active">Редагування поста</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-8">
                        <form
                            action="{{ route('admin.post.update', $post->id) }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group w-50">
                                <input type="text" class="form-control" name="title" placeholder="Назва поста"
                                       value="{{ $post->title }}">
                                @error('title')
                                <div class="text-danger">Це поле необхідно заповнити</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <textarea type="text" class="form-control" name="content"
                                          placeholder="Введіть ваш текст">{{ $post->content }}</textarea>
                                @error('content')
                                <div class="text-danger">Це поле необхідно заповнити</div>
                                @enderror
                            </div>
                            <div class="form-group w-50">
                                <label for="exampleInputFile">Додати превью</label>
                                <div class="w-25">
                                    <img src="{{ url('storage/' . $post->preview_image) }}"
                                         alt="{{ 'preview_image' }}" class="w-50">
                                </div>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="preview_image">
                                        <label class="custom-file-label">Обрати файл</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span
                                            class="input-group-text">Змінити</span>
                                    </div>
                                </div>
                                @error('preview_image')
                                <div class="text-danger">Це поле необхідно заповнити</div>
                                @enderror
                            </div>
                            <div class="form-group w-50">
                                <label for="exampleInputFile">Додати головне зображення</label>
                                <div>
                                    <img src="{{ url('storage/' . $post->main_image) }}"
                                         alt="{{ 'main_image' }}" class="w-50">
                                </div>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="main_image">
                                        <label class="custom-file-label">Обрати файл</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span
                                            class="input-group-text">Змінити</span>
                                    </div>
                                </div>
                                @error('main_image')
                                <div class="text-danger">Це поле необхідно заповнити</div>
                                @enderror
                            </div>

                            <div class="form-group col-4">
                                <label>Категорія</label>
                                <select class="form-control" name="category_id">
                                    @foreach($categories as $category)
                                        <option
                                            value="{{ $category->id }}" {{$category->id == $post->category_id ? 'selected' : ''}}
                                        >{{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Теги</label>
                                <select class="select2" name="tag_ids[]" multiple="multiple"
                                        data-placeholder="Додайте теги" style="width: 100%;">
                                        @foreach($tags as $tag)
                                            <option
                                                {{ is_array($post->tags->pluck('id')->toArray()) && in_array($tag->id, $post->tags->pluck('id')->toArray()) ? 'selected' : '' }} value="{{ $tag->id }}">{{ $tag->title }}</option>
                                        @endforeach
                                </select>
                            </div>
                            <div class="mb-4">
                                <input type="submit" value="Редагувати"
                                       class="btn btn-block btn-info w-25">
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
