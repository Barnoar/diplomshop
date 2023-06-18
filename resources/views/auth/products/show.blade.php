@extends('auth.layouts.master')

@section('title', 'Продукт ' . $product->name)

@section('content')
    <div class="col-md-12">
        <h1>{{ $product->name }}</h1>
        <table class="table">
            <tbody>
            <tr>
                <th>
                    Поле
                </th>
                <th>
                    Значение
                </th>
            </tr>
            <tr>
                <td>ID</td>
                <td>{{ $product->id}}</td>
            </tr>
            <tr>
                <td>Название</td>
                <td>{{ $product->title }}</td>
            </tr>
            <tr>
                <td>Цена</td>
                <td>{{ $product->price }}</td>
            </tr>
            <tr>
                <td>Новая цена</td>
                <td>{{ $product->new_price }}</td>
            </tr>
            <tr>
                <td>Наличие</td>
                <td>{{ $product->in_stock }} (1 - Есть в наличии, 0 - Нет в наличии)</td>
            </tr>
            <tr>
                <td>Описание</td>
                <td>{{ $product->description }}</td>
            </tr>
            <tr>
                <td>Картинка</td>
                {{-- <td><img src="/{{$product->images[0]['img']}}" height="240px"></td> --}}
                <td><img src="{{Storage::url($product->img)}}" height="240px"></td>
            </tr>
            <tr>
                <td>Категория</td>
                <td>{{ $product->category->title }}</td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection