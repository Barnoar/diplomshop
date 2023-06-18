@extends('layouts.app')

@section('title-block')SoundSpace - Корзина@endsection

@section('custom_css')
    <link rel="stylesheet" type="text/css" href="/css/basket.css">
@endsection

@section('content')
<div class="BasketContainer">
    <div class="Basket__inner">
        <h2 class="Basket__title"> Корзина </h2>
        <p class="Basket__description">Оформление заказа</p>
    </div>
</div>

<div class="panel">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Название</th>
            <th>Кол-во</th>
            <th>Цена</th>
            <th>Общая стоимость</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($order->products as $product)
            <tr>
                <td>
                    
                    <a href="{{ route('showProduct', [$product->category['alias'], $product->id]) }}">
                        <!-- @php
                            $image = '';
                            if(count($product->images) > 0){
                                $image = $product->images[0]['img'];
                            } else {
                                $image = 'no_image.png';
                            }
                        @endphp -->
                        <div class="details_image_large">
                            <img height="90px" src="{{Storage::url($product->img)}}" alt="{{$product->title}}">
                            {{ $product->title }}
                        </div>
                    </a>
                </td>
                <td>
                    <div class="quantity">
                        <form action="{{ route('basket-add', $product) }}" method="POST">
                            <button type="submit" class="btn" href="">+</button>
                            @csrf
                        </form>
                        <span class="">{{$product->pivot->count}}</span>
                        <form action="{{ route('basket-remove', $product) }}" method="POST">
                            <button type="submit" class="btn" href="">-</button>
                            @csrf
                        </form>
                    </div>
                </td>
                <td>₽{{ $product->new_price }}</td>
                <td>₽{{ $product->getPriceForCount() }}</td>
            </tr>
            @endforeach
            <tr>
                <td colspan="3">Общая стоимость:</td>
                <td>₽{{$order->getFullPrice()}}</td>
            </tr>
        </tbody>
    </table>
    <div class="btn__order" role="group">
        <a type="button" class="btn" href="{{route('basket-place')}}">Оформить заказ</a>
    </div>
</div>
@endsection