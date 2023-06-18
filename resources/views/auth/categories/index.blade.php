@extends('auth.layouts.master')

@section('title', 'Категории')

@section('custom_css')
    <link rel="stylesheet" type="text/css" href="/css/basket.css">
@endsection

@section('content')
<div class="col-md-12">
    <h1>Категории</h1>
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
                Описание
            </th>
            <th>
                Алиас
            </th>
            <th style="width: 250px">
                Действия
            </th>
        </tr>
        @foreach($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->title }}</td>
                <td>{{ $category->desc }}</td>
                <td>{{ $category->alias }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <form action="{{ route('categories.destroy', $category) }}" method="POST">
                            <a class="btn btn-success" type="button" href="{{ route('categories.show', $category) }}">Открыть</a>
                            <a class="btn btn-warning" type="button" href="{{ route('categories.edit', $category) }}">Редактировать</a>
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
        <a class="btn" type="button" href="{{ route('categories.create') }}">Добавить категорию</a>
    </div>
</div>

@endsection