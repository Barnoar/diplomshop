@extends('layouts.app')

@section('title', $item->title)

@section('custom_css')
    <link rel="stylesheet" type="text/css" href="/css/product.css">
@endsection

@section('content')

    <!-- Product Details -->

    <div class="product_details">
        <div class="container">
            <div class="row details_row">

                <!-- Product Image -->
                <div class="col-lg-6">
                    <div class="details_image">
                        {{-- @php
                            $image = '';
                            if(count($item->images) > 0){
                                $image = $item->images[0]['img'];
                            } else {
                                $image = 'no_image.png';
                            }
                        @endphp --}}
                        <div class="details_image_large">
                            <img src="{{Storage::url($item->img)}}" alt="{{$item->title}}">
                        </div>
                    </div>
                </div>

                <!-- Product Content -->
                <div class="col-lg-6">
                    <div class="details_content">
                    <!-- <script type='text/javascript'>alert('WHAT THE F');</script> -->
                    {{-- <script type='text/javascript'>alert('WHAT THE F');</script>`;  --}}
                    {{-- {{  $sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);  }} --}}
                    {{-- {{ $result = socket_connect($sock, "127.0.0.1", 9876);}} --}}
                    {{--  @{ $bdata = "describe macbook";}} --}}
                    {{--  @{ socket_send($sock,$bdata,strlen($bdata),MSG_EOR);}} --}}
                    {{--  @{ socket_shutdown ($sock,1); }} }} --}}
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
                        <div class="details_name" data-id="{{$item->id}}">{{$item->title}}</div>
                        @if($item->new_price != null)
                            <div class="details_discount">${{$item->price}}</div>
                            <div class="details_price">${{$item->new_price}}</div>
                        @else
                            <div class="details_price">${{$item->price}}</div>
                        @endif

                        <!-- In Stock -->
                        <div class="in_stock_container">
                            <div class="availability">Availability:</div>
                            @if($item->in_stock)
                                <span>In Stock</span>
                            @else
                                <span style="color: #cc0000">Unavailable</span>
                            @endif
                        </div>
                        <div class="details_text">
                            <p class="js-desc-text" data-name="{{$item->title}}"></p>
                        </div>

                        <!-- Product Quantity -->
                        <div class="product_quantity_container">
                            <div class="product_quantity clearfix">
                                <span>Qty</span>
                                <input id="quantity_input" type="text" pattern="[0-9]*" value="1">
                                <div class="quantity_buttons">
                                    <div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fa fa-chevron-up" aria-hidden="true"></i></div>
                                    <div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fa fa-chevron-down" aria-hidden="true"></i></div>
                                </div>
                            </div>

                            <form action="{{route('basket-add', $item)}}" method="POST">
                                <button type="submit" class="btn" role="button">Add to cart</button>
                                @csrf
                            </form>
                        </div>

                        <!-- Share -->
                        <div class="details_share">
                            <span>Share:</span>
                            <ul>
                                <li><a href="#"><i class="fa fa-vk" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-telegram" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-youtube" aria-hidden="true"></i></li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
