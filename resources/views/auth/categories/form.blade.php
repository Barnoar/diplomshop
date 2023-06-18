@extends('auth.layouts.master')

@isset($category)
    @section('title', 'Редактировать категорию ' . $category->title)
@else
    @section('title', 'Создать категорию')
@endisset

@section('custom_css')
    <link rel="stylesheet" type="text/css" href="/css/basket.css">
@endsection

@section('content')
    <div class="col-md-12">
        @isset($category)
            <h1>Редактировать Категорию <b>{{ $category->title }}</b></h1>
                @else
                    <h1>Добавить Категорию</h1>
                @endisset

                <form method="POST" enctype="multipart/form-data"
                      @isset($category)
                      action="{{ route('categories.update', $category) }}"
                      @else
                      action="{{ route('categories.store') }}"
                    @endisset
                >
                    <div>
                        @isset($category)
                            @method('PUT')
                        @endisset
                        @csrf
                        <div class="input-group row">
                            <label for="title" class="col-sm-2 col-form-label">Название: </label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="title" id="title"
                                       value="@isset($category){{ $category->title }}@endisset">
                            </div>
                        </div>
                        <br>
                        <div class="input-group row">
                            <label for="desc" class="col-sm-2 col-form-label">Описание: </label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="desc" id="desc"
                                       value="@isset($category){{ $category->desc }}@endisset">
                            </div>
                        </div>
                        <br>
                        <div class="input-group row">
                            <label for="alias" class="col-sm-2 col-form-label">Алиас: </label>
                            <div class="col-sm-6">
							<textarea name="alias" id="alias" cols="72"
                                      rows="7">@isset($category){{ $category->alias }}@endisset</textarea>
                            </div>
                        </div>
                        <br>
                        {{-- <div class="input-group row">
                            <label for="img" class="col-sm-2 col-form-label">Описание: </label>
                            <div class="col-sm-6">
							<textarea name="img" id="img" cols="72"
                                      rows="7">@isset($category){{ $category->alias }}@endisset</textarea>
                            </div>
                        </div> --}}
                        <div class="input-group row">
                            <label for="img" class="col-sm-2 col-form-label">Картинка: </label>
                            <div class="col-sm-10">
                                <label class="btn btn-default btn-file">
                                    Загрузить <input type="file" style="display: none;" name="img" id="img">
                                </label>
                            </div>
                        </div>
                        <button class="btn btn-success">Сохранить</button>
                    </div>
                </form>
    </div>
@endsection