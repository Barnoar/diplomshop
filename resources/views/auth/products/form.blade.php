@extends('auth.layouts.master')

@isset($product)
    @section('title', 'Редактировать товар ' . $product->title)
@else
    @section('title', 'Создать товар')
@endisset

@section('content')
    <div class="col-md-12">
        @isset($product)
            <h1>Редактировать товар <b>{{ $product->title }}</b></h1>
        @else
            <h1>Добавить товар</h1>
        @endisset
        <form method="POST" enctype="multipart/form-data"
              @isset($product)
              action="{{ route('products.update', $product) }}"
              @else
              action="{{ route('products.store') }}"
            @endisset
        >
            <div>
                @isset($product)
                    @method('PUT')
                @endisset
                @csrf
                <div class="input-group row">
                    <label for="title" class="col-sm-2 col-form-label">Название: </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="title" id="title"
                               value="@isset($product){{ $product->title }}@endisset">
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="price" class="col-sm-2 col-form-label">Цена: </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="price" id="price"
                               value="@isset($product){{ $product->price }}@endisset">
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="new_price" class="col-sm-2 col-form-label">Новая цена: </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="new_price" id="new_price"
                               value="@isset($product){{ $product->new_price }}@endisset">
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="in_stock" class="col-sm-2 col-form-label">Наличие: </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="in_stock" id="in_stock"
                               value="@isset($product){{ $product->in_stock }}@endisset">
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="description" class="col-sm-2 col-form-label">Описание: </label>
                    <div class="col-sm-6">
								<textarea name="description" id="description" cols="72"
                                rows="7">@isset($product){{ $product->description }}@endisset</textarea>
                    </div>
                </div>
                <div class="input-group row">
                    <label for="category_id" class="col-sm-2 col-form-label">Категория: </label>
                    <div class="col-sm-6">
                        <select name="category_id" id="category_id" class="form-control">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}"
                                    @isset($product)
                                        @if ($product->category->id == $category->id)
                                            @selected(true)
                                        @endif
                                    @endisset
                                    >{{$category->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="img" class="col-sm-2 col-form-label">Картинка: </label>
                    <div class="col-sm-10">
                        <label class="btn btn-default btn-file">
                            Загрузить <input type="file" style="display: none;" name="img" id="img">
                        </label>
                    </div>
                </div>
                <br>
                <button class="btn btn-success">Сохранить</button>
            </div>
        </form>
    </div>
@endsection