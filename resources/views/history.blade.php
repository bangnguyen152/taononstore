<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Táo non</title>
    <link rel="stylesheet" href="{{asset('assets/css/base.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/grid.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/order.css')}}" />

    <link
        rel="stylesheet"
        href="{{asset('assets/icon/themify-icons-font/themify-icons/themify-icons.css')}}"
    />
</head>
<body>
<div id="main">
    <header class="header">
        <!-- logo -->
        <div id="header__logo">
            <a class="header__logo-link" href="/">
                <img
                    src="{{asset('assets/img/logoapple.png')}}"
                    alt="apple logo"
                    class="header__logo-img"
                />
            </a>
        </div>
        <!-- navigation -->
        <ul class="nav-list">
            <li class="nav-item nav-iphone">
                <a href="{{route('iphone')}}" class="nav-item__link">iPhone</a>
            </li>
            <li class="nav-item nav-mac">
                <a href="{{route('mac')}}" class="nav-item__link">Mac</a>
            </li>
            <li class="nav-item nav-ipad">
                <a href="{{route('ipad')}}" class="nav-item__link">iPad</a>
            </li>
            <li class="nav-item nav-watch">
                <a href="{{route('watch')}}" class="nav-item__link">Watch</a>
            </li>
            <li class="nav-item nav-sound">
                <a href="{{route('amthanh')}}" class="nav-item__link">Âm thanh</a>
            </li>
            <li class="nav-item nav-accessory">
                <a href="{{route('phukien')}}" class="nav-item__link">Phụ kiện</a>
            </li>
        </ul>

        <div class="nav-btn">
            <!-- btn cart -->
            <@if(!session()->has('id'))

                <div class="nav-btn__cart">
                    <a href="{{route('login')}}">
                        <i class="nav-icon ti-shopping-cart"></i>
                    </a>
                </div>
            @else
                <div class="nav-btn__cart">
                    <a href="{{route('cart')}}">
                        <i class="nav-icon ti-shopping-cart"></i>
                    </a>
                    <div class="cart__quantity">{{\Cart::count()}}</div>
                </div>
                <!-- btn search -->
            @endif
            <!-- btn search -->
            <div class="nav-btn__search">
                <i class="nav-icon ti-search"></i>
            </div>
            @if(!session()->has('role_id'))
                <div class="nav-btn__login">
                    <a href="{{route('login')}}" class="login__link">Đăng nhập</a>
                </div>
            @else
                <!-- phần này sau khi login vào sẽ hiện -->
                <div class="nav-user">
                    <img src="{{ Avatar::create(session()->get('full_name'))->toBase64() }}" alt="" class="nav-user__img">
                    <div class="user-dropdown">
                        <ul class="user-dropdown__list">
                            <li class="user-dropdown__item">{{session()->get('full_name')}}</li>
                            <li class="user-dropdown__item"><a href="{{route('profile',session()->get('id'))}}">Tài khoản của tôi</a></li>
                            <li class="user-dropdown__item"><a href="{{route('history',session()->get('id'))}}">Lịch sử mua hàng </a></li>
                            <li class="user-dropdown__item"><a href="{{route('logout')}}">Đăng xuất</a></li>
                        </ul>
                    </div>
                </div>
            @endif
        </div>
    </header>
    <!-- main content -->
    <div class="container">
        <div class="grid">
            <div class="row">
                <div class="col l-6 l-o-3 m-12">
                    <div class="top-content">
                        <span class="buymore"> Đơn hàng của tôi </span>
                    </div>

                    <div class="middle-content">
                        <ul class="order-list">
                            @foreach($products as $product)
                            <li class="order-item">
                                <div class="order-item__top">
                                    <span class="order-item__status">{{ProductStatus($product->product_status)}}</span>
                                    <form action="{{route('comment')}}" method="post">
                                        @csrf
                                        <input type="text" name="product_id" value="{{$product->product_id}}" hidden>
                                        
                                        <span class="order-item__rate"><button type="submit" class="btn btn-primary">Đánh giá</button></span>
                                    </form>

                                </div>

                                <ul class="order-item__detail-list">
                                    <li class="order-item__detail-item">
                                        <img
                                            src="{{ asset('/'.$product->product_photo)}}"
                                            alt=""
                                            class="order-item__img"
                                        />
                                        <div class="order-item__info">
                          <span class="order-item__name">
                            {{$product->product_name}}</span
                          >
                                            <div class="order-item__wrap-color-qnt">
{{--                                                <span class="order-item__color">Màu: Bạc</span>--}}
                                                <span class="order-item__quantity">x{{$product->product_qty}}</span>
                                            </div>
                                        </div>
                                        <div class="order-item__price">
                                            <span class="current-price">{{number_format($product->product_price,0,',','.')}}VNĐ</span>
                                        </div>
                                    </li>
{{--                                    <li class="order-item__detail-item">--}}
{{--                                        <img--}}
{{--                                            src="{{ asset('/'.$product->product_photo)}}"--}}
{{--                                            alt=""--}}
{{--                                            class="order-item__img"--}}
{{--                                        />--}}
{{--                                    </li>--}}
                                </ul>
                           </li>
                                @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
