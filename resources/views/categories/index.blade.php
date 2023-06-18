@extends('layouts.app')

@section('title', $cat->title)

@section('custom_css')
    <link rel="stylesheet" type="text/css" href="/css/style.css">
@endsection

@section('content')
    <div class="home">
        <div class="home_container">
            <div class="home_background" style="background-image:url('/images/{{$cat->img}}')"></div>
            <div class="home_content_container">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="home_content">
                                <div class="home_title">{{$cat->title}}<span>.</span></div>
                                <div class="home_text"><p>{{$cat->desc}}</p></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Products -->

    <div class="products">
        <div class="container">
            <div class="row">
                <div class="col">

                    <!-- Product Sorting -->
                    <div class="sorting_bar d-flex flex-md-row flex-column align-items-md-center justify-content-md-start">
                        <div class="results">Showing <span>{{$cat->products->count()}}</span> results</div>
                        <div class="sorting_container ml-md-auto">
                            <div class="sorting">
                                <ul class="item_sorting">
                                    <li>
                                        <span class="sorting_text">Sort by</span>
                                        <i class="fa fa-chevron-down" aria-hidden="true"></i>
                                        <ul>
                                            <li class="product_sorting_btn" data-order="default"><span>Default</span></li>
                                            <li class="product_sorting_btn" data-order="price-low-high"><span>Price: Low-High</span></li>
                                            <li class="product_sorting_btn" data-order="price-high-low"><span>Price: High-Low</span></li>
                                            <li class="product_sorting_btn" data-order="name-a-z"><span>Name: A-Z</span></li>
                                            <li class="product_sorting_btn" data-order="name-z-a"><span>Name: Z-A</span></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="main-content">
        <div class="container">
            <div class="row">
                @foreach($cat->products as $product)
                    <!-- Product -->
                    {{-- @php
                        $image = '';
                        if(count($product->images)>0){
                            $image = $product->images[0]['img'];
                        } else {
                            $image = 'no-image.png';
                        }
                    @endphp --}}
                    <div class="cardnum col-lg-3 col-sm-6">
                        <div class="product-card">
                            <div class="product-thumb">
                                <a href="#"><img src="{{Storage::url($product->img)}}" alt="{{$product->title}}"></a>
                            </div>
                            <div class="product-details">
                                <h4><a href="#">{{$product->title}}</a></h4>
                                {{-- @php
                                    echo "<script type='text/javascript'>alert('WHAT THE F');</script>";
                                    echo "<script type='text/javascript'>console.log('WHAT THE F');</script>";
                                    echo "<h1>ejejeje</h1>"
                                    $sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
                                    $result = socket_connect($sock, "127.0.0.1", 9876);
                                    $bdata = "describe macbook";
                                    socket_send($sock,$bdata,strlen($bdata),MSG_EOR);
                                    socket_shutdown ($sock,1);
                                    while ($out = socket_read($sock, 2048)) {
                                        echo $out;
                                    }
                                    socket_close($sock);
                                    
                                @endphp --}}
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus facilis eaque possimus itaque, deleniti quasi!</p>
                                <div class="product-bottom-details d-flex justify-content-between">
                                    @if($product->new_price != null)
                                        <div class="product-price">
                                            <small>₽{{$product->price}}</small> ₽{{$product->new_price}}
                                        </div>
                                    @else
                                        <div class="product-price">₽{{$product->price}}</div>
                                    @endif
                                    <div class="product-links">
                                        <a href="{{route('showProduct',[$product->category['alias'],$product->id])}}"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                                    </div>
                                    @csrf
                             </div>
                            </div>
                        </div>
                    </div>
                @endforeach   
            </div>
        </div>
    </section>

@endsection

