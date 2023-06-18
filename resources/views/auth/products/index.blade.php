@extends('auth.layouts.master')

@section('title', 'Товары')

@section('custom_css')
    <link rel="stylesheet" type="text/css" href="/css/basket.css">
@endsection

@section('content')
    <div class="col-md-12">
        <h1>Товары</h1>
        <table class="table">
            <tbody>
            <tr>
                <th>
                    #
                </th>
                <th>
                    Название
                </th>
                <th>
                    Цена
                </th>
                <th>
                    Новая цена
                </th>
                <th>
                    Наличие
                </th>
                <th>
                    Описание
                </th>
                <th>
                    Категория
                </th>
                <th>
                    Действия
                </th>
            </tr>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id}}</td>
                    <td>{{ $product->title }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->new_price }}</td>
                    <td>{{ $product->in_stock }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->category->title }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <form action="{{ route('products.destroy', $product) }}" method="POST">
                                <a class="btn btn-success" type="button"
                                   href="{{ route('products.show', $product) }}">Открыть</a>
                                <a class="btn btn-warning" type="button"
                                   href="{{ route('products.edit', $product) }}">Редактировать</a>
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-danger" type="submit" value="Удалить"></form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="btn__order">
            <a class="btn" type="button" href="{{ route('products.create') }}">Добавить товар</a>
        </div>
    </div>
@endsection