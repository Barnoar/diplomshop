@extends('layouts.app')

@section('title')SoundSpace - О нас@endsection

@section('content')
    <div class="aboutUs">
        <section>
            <div class="container-xl">
                <div class="aboutUs__title title">SoundSpace</div>
                
                    <div class="aboutUs__row1-text">
                        <p>
                            Интернет-магазин музыкальных инструментов и оборудования.
                            <br>
                            Мы стремимся предоставить нашим клиентам лучший выбор музыкальных инструментов и аксессуаров, а также качественное обслуживание.
                        </p>
                    </div>
                
        </section>
        
        <section class="aboutUs__row3-wrapper">
            <div class="container-xl">
                <div class="aboutUs__row3 row">
                    <div class="aboutUs__row3-info">
                            <h6>
                                В нашем магазине вы найдете широкий ассортимент музыкальных инструментов, включая гитары, барабаны, клавишные инструменты, духовые инструменты и многое другое. Мы также предлагаем аксессуары, звуковое и световое оборудование для музыкантов и аудиолюбителей.
                            </h6>
                        <div class="row">  
                            <div class="col-md-6">
                                <div class="contacts">
                                    <h5>Контакты</h5>
                                <p>
                                    <svg width="34" height="34" fill="#FFD600">
                                        <use xlink:href='#checked'></use>
                                    </svg>
                                    Телефон: +8 900 000 00 00
                                </p>
                                <p>
                                    <svg width="34" height="34" fill="#FFD600">
                                        <use xlink:href='#checked'></use>
                                    </svg>
                                    Электронная почта: info@soundspace.com
                                </p>
                                <p>
                                    <svg width="34" height="34" fill="#FFD600">
                                        <use xlink:href='#checked'></use>
                                    </svg>
                                    Адрес: ул. Чехова 16, Ханты-Мансийск
                                </p>
                                </div>
                            </div> 
                            <div class="col-md-6">   
                                <p class="map">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1494.6833589312128!2d56.22896098636605!3d58.00812964370769!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sru!2sru!4v1684834424894!5m2!1sru!2sru" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </p>
                            </div> 
                        </div>     
                    </div>
                </div>
            </div>
        </section>

    </div>

@endsection