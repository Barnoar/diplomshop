@extends('auth.layouts.master')

@section('title', 'Категория ' . $category->title)

@section('custom_css')
    <link rel="stylesheet" type="text/css" href="/css/basket.css">
@endsection

@section('content')
    <div class="col-md-12">
        <h1>Категория: {{$category->title}}</h1>
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
                <td>{{ $category->id }}</td>
            </tr>
            <tr>
                <td>Название</td>
                <td>{{ $category->title }}</td>
            </tr>
            <tr>
                <td>Описание</td>
                <td>{{ $category->desc }}</td>
            </tr>
            <tr>
                <td>Алиас категории</td>
                <td>{{ $category->alias }}</td>
            </tr>
            <tr>
                <td>Картинка</td>
                <td><img src="{{Storage::url($category->img)}}"
                         height="240px"></td>
            </tr>
            <tr>
                <td>Кол-во товаров</td>
                <td>{{ $category->products->count() }}</td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection