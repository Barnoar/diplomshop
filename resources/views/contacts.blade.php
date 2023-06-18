@extends('layouts.app')

@section('title-block')SoundSpace - Контакты@endsection

@section('content')
<div class="container-xl">
        <nav class="basket__breadcrumb breadcrumb">
            <ul class="breadcrumb__list">
                <li class="breadcrumb__item">
                    <a href="./index.html" class="breadcrumb__link">Главная</a>
                </li>
                <li class="breadcrumb__item">
                    <a href="#!" class="breadcrumb__link">Каталог</a>
                </li>
            </ul>
        </nav>
</div>

<section class="paymentAndDelivery">
    <div class="container-xl">
        <h1 class="paymentAndDelivery__title title">Наши контакты</h1>
        <div class="row paymentAndDelivery__section1">
            <div class="col-lg-5">
                <div class="paymentAndDelivery__card">
                    <div class="paymentAndDelivery__card-phone">
                        <div class="paymentAndDelivery__card-head">
                            <svg width="18" height="17" fill="#FFD600">
                                <use xlink:href='#phone-ringing'></use>
                            </svg>
                            <h6>Телефонные номера</h6>
                        </div>
                        <div class="paymentAndDelivery__card-phone-body">
                            <div class="paymentAndDelivery__card-phone-shop">
                                <span>Магазин</span>
                                <span>+998 90 000 00 00</span>
                            </div>
                            <div class="paymentAndDelivery__card-phone-support">
                                <span>Тех поддержка</span>
                                <span>+998 90 000 00 00</span>
                            </div>
                            <div class="paymentAndDelivery__card-phone-partner">
                                <span>Позвоните по номеру если хотите стать партнером</span>
                                <span>+998 90 000 00 00</span>
                            </div>
                        </div>
                    </div>
                    <div class="paymentAndDelivery__card-address">
                        <div class="paymentAndDelivery__card-head">
                            <svg width='12.6' , height='18' fill='#FFD600'>
                                <use xlink:href='#header-content-map'></use>
                            </svg>
                            <h6>Адрес</h6>
                        </div>
                        <div class="paymentAndDelivery__card-address-body">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Dictum lectus erat magna.
                        </div>
                    </div>
                    <div class="paymentAndDelivery__card-mail">
                        <div class="paymentAndDelivery__card-head">
                            <svg width="18" height="18" fill="#FFD600">
                                <use xlink:href='#envelope'></use>
                            </svg>
                            <h6>Адрес</h6>
                        </div>
                        <div class="paymentAndDelivery__card-address-body">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Dictum lectus erat magna.
                        </div>
                    </div>
                    <div class="paymentAndDelivery__card-o`cklock">
                        <div class="paymentAndDelivery__card-head">
                            <svg width="18" height="18" fill="#FFD600">
                                <use xlink:href="#o`clock"></use>
                            </svg>
                            <h6>Адрес</h6>
                        </div>
                        <div class="paymentAndDelivery__card-o`cklock-body">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Dictum lectus erat magna.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection