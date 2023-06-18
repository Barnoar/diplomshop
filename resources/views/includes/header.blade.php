<div class="header__content">
    <div class="container-xl">
        <div class="header__content-inner">
            <div class="header__content-logoWrapper">
                <a class="header__content-logoLink" href="/">
                    <img class="header__content-logo" src="/img/logo1.png" alt="Logo">
                </a>
            </div>

            <form method="get" action="{{route('search')}}">
            <div class="header__content-inputWrapper">
                <input class="header__content-input" type="text" id="s" name="s" placeholder="Поиск по товарам...">
                <span>
                    <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                </span>
                <div></div>
            </div>
            </form>

            <a class="header__content-phone" href="tel:+8 900 000 00 00">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <div>
                    <span>+8 900 000 00 00</span>
                    <p>Связаться с нами</p>
                </div>
            </a>
            <a class="header__content-cart" href="/basket">
                <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                <div>
                    <p>Корзина</p>
                </div>
            </a>
        </div>
    </div>
</div>

<div class="header__bottom">
    <div class="container-xl">
        <div class="header__bottom-inner">
            <div class="menu">
                <span class="mune__icon"></span>
            </div>

            <div class="header__bottom-nav">

                <ul class="header__bottom-list">
                    
                    <div class="hassubs-dropdown">
                        <button class="hassubs-dropbtn">Все категории 
                            <i class="fa fa-caret-down"></i>
                        </button>
                        <div class="hassubs-dropdown-content">
                            @foreach($categories as $category)
                                <li><a href="{{route('showCategory',$category->alias)}}">{{$category->title}}</a></li>
                            @endforeach
                        </div>
                    </div> 
                    
                    <li class="header__bottom-item"><a class="header__bottom-link" href="/aboutus">О нас</a>
                    </li>
                </ul>
            </div>

            <div class="header__content-inputWrapper-mob">
                <input class="header__content-input" type="text" placeholder="Поиск по товарам...">
                <span>
                    <svg width="16" height="15">
                        <use xlink:href="#header-content-input" fill="#AFB0B4"></use>
                    </svg>
                </span>
            </div>
        </div>
    </div>
</div>


