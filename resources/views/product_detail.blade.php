<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Táo non</title>
    <link rel="stylesheet" href="{{asset('assets/css/base.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/product-detail.css')}}" />

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
<div class="container">
    <div class="introduction-detail">
        <div class="center-page">
            <aside class="slider-detail">
                @foreach($images as $image)
                <img
                    src="{{ asset('/'.$image->thumbnail) }}"
                    alt="macbook pro 14"
                />
                @endforeach
            </aside>
            <aside class="product-info">
                <h1 class="product-name">
                    {{$products->title}}
                </h1>
                <span class="price-promo-title">Giá </span>
                <h2 class="product-price">{{number_format($products->price,0,',','.')}}đ</h2>
                <div class="product-capacity">
                    <span class="product-capacity__detail">RAM {{$products->ram}}  - ROM {{$products->capacity}}</span>
                </div>
{{--                <div class="product-color">--}}
{{--                    <h4 class="product-color__text">Màu: Bạc</h4>--}}
{{--                    <ul class="product-color__opt-list">--}}
{{--                        <li--}}
{{--                            class="product-color__opt-item product-color__opt-item--gray product-color__opt-item--active"--}}
{{--                        >--}}
{{--                            <a href=""></a>--}}
{{--                        </li>--}}
{{--                        <li--}}
{{--                            class="product-color__opt-item product-color__opt-item--silver"--}}
{{--                        >--}}
{{--                            <a href=""></a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
                <div class="promotion-detail">
                    <span class="promotion-detail__title">Khuyến mãi</span>
                    <span class="promotion-detail__time">
                Giá và khuyến mãi áp dụng đến 23:00 13/07
              </span>
                    <ul class="promotion-detail__list">
                        <li class="promotion-detail__item">
                            Mua kèm Office Home & Student tặng quà 200,000đ
                        </li>
                        <li class="promotion-detail__item">
                            Tặng suất mua kèm apple watch giảm 20% (Không áp dụng kèm
                            khuyến mãi khác của đồng hồ)
                        </li>
                    </ul>
                </div>
                <div class="btn-wrap">
                    <button class="buy-now-btn primary-btn">Mua ngay</button>
                    @if(session()->has('id'))
                    <a class="add-cart-btn primary-btn" href="{{route('addtocart',$product->id)}}" role="button">Thêm vào giỏ</a>
                    @else
                        <a class="add-cart-btn primary-btn" href="{{route('login')}}" role="button">Thêm vào giỏ</a>
                    @endif
{{--                    <button class="add-cart-btn primary-btn"><a href="">Thêm vào giỏ</a></button>--}}
                </div>
                <div class="policy-wrap">
                    <ul class="policy-list">
                        <li class="policy-item">
                            <i class="policy-item__icon ti-dropbox"></i>
                            <span class="policy-item__text">
                    Bộ sản phẩm gồm: Sách hướng dẫn, Thùng máy, Cáp ( Type C -
                    sạc magsafe ), Sạc Laptop Apple
                  </span>
                        </li>
                        <li class="policy-item">
                            <i class="policy-item__icon ti-reload"></i>
                            <span class="policy-item__text">Hư gì đổi nấy 12 tháng</span>
                        </li>
                        <li class="policy-item">
                            <i class="policy-item__icon ti-shield"></i>
                            <span class="policy-item__text"
                            >Bảo hành chính hãng 1 năm</span
                            >
                        </li>
                        <li class="policy-item">
                            <i class="policy-item__icon ti-truck"></i>
                            <span class="policy-item__text"
                            >Giao hàng nhanh toàn quốc</span
                            >
                        </li>
                        <li class="policy-item">
                            <i class="policy-item__icon ti-help"></i>
                            <span class="policy-item__text"
                            >Tổng đài: 1900.9696.42 (9h00 - 21h00 mỗi ngày)</span
                            >
                        </li>
                    </ul>
                </div>
            </aside>
        </div>
    </div>
</div>
    <footer class="footer">
        <div class="grid">
            <div class="grid__row">
                <div class="grid__col--4">
                    <h4 class="footer__heading">Tổng đài</h4>
                    <ul class="footer__list">
                        <li class="footer__item">
                            <a href="/" class="footer__item-link">
                                Mua hàng: 1900.9696.42 (7:30 - 22:00)
                            </a>
                        </li>
                        <li class="footer__item">
                            <a href="/" class="footer__item-link">
                                CSKH: 1900.9868.43 (8:00 - 21:30)
                            </a>
                        </li>
                        <li class="footer__item">
                            <a href="/" class="footer__item-link">
                                Kỹ thuật: 1900.8668.54 (7:30 - 22:00)
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="grid__col--4">
                    <h4 class="footer__heading">Hệ thống cửa hàng</h4>
                    <ul class="footer__list">
                        <li class="footer__item">
                            <a href="/" class="footer__item-link"> Xem 52 cửa hàng </a>
                        </li>
                        <li class="footer__item">
                            <a href="/" class="footer__item-link"> Nội quy cửa hàng </a>
                        </li>
                        <li class="footer__item">
                            <a href="/" class="footer__item-link"> Chất lượng phục vụ </a>
                        </li>
                        <li class="footer__item">
                            <a href="/" class="footer__item-link">
                                Chính sách bảo hành & đổi trả
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="grid__col--4">
                    <h4 class="footer__heading">Hỗ trợ khách hàng</h4>
                    <ul class="footer__list">
                        <li class="footer__item">
                            <a href="/" class="footer__item-link"
                            >Điều kiện giao dịch chung</a
                            >
                        </li>
                        <li class="footer__item">
                            <a href="/" class="footer__item-link"
                            >Hướng dẫn mua hàng online</a
                            >
                        </li>
                        <li class="footer__item">
                            <a href="/" class="footer__item-link">Chính sách giao hàng</a>
                        </li>
                        <li class="footer__item">
                            <a href="/" class="footer__item-link">Hướng dẫn thanh toán</a>
                        </li>
                    </ul>
                </div>
                <div class="grid__col--4">
                    <h4 class="footer__heading">Về thương hiệu Táo Non</h4>
                    <ul class="footer__list">
                        <li class="footer__item">
                            <a href="/" class="footer__item-link">Giới thiệu Táo Non</a>
                        </li>
                        <li class="footer__item">
                            <a href="/" class="footer__item-link">Bán hàng doanh nghiệp</a>
                        </li>
                        <li class="footer__item">
                            <a href="/" class="footer__item-link"
                            >Chính sách bảo mật thông tin</a
                            >
                        </li>
                        <li class="footer__item">
                            <a href="/" class="footer__item-link">Tích điểm Quà tặng VIP</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <div class="footer__copyright">
        <p class="footer__copyrigh-text">
            © 2022 - Bản quyền thuộc về Công ty Táo Non
        </p>
    </div>
</div>
<div class="modal-search hidden">
    <div class="search-wrap">
        <div class="search-icon">
            <i class="ti-search search-icon"></i>
        </div>
        <div class="search-input">
            <input type="text" placeholder="Tìm kiếm sản phẩm" class="search-input__fillin">
        </div>
        <div class="search-close">
            <i class="ti-close search-close__icon"></i>
        </div>
    </div>
</div>
<script src="{{asset('assets/days/app.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/days/app.js')}}"></script>
</body>
</html>


