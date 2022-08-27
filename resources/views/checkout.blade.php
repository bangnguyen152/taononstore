<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Táo non</title>
    <link rel="stylesheet" href="{{asset('assets/css/base.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/cart.css')}}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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
        <div class="grid__row">
            <div class="grid__col--2 cart-content">
                <div class="customer-infor">
                    <h4>Thông tin khách hàng</h4>
                </div>
                        <div class="fillinform">
                        </div>
                        <div class="customer-address">
                            <ul class="list-group mb-12">
                                <li class="list-group-item d-flex justify-content-between lh-condensed">
                                    <div>
                                        <h6 class="my-0">Họ Tên</h6>
                                    </div>
                                    <span class="text-muted">{{$dataU['full_name']}}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between lh-condensed">
                                    <div>
                                        <h6 class="my-0">Số điện thoại</h6>
                                    </div>
                                    <span class="text-muted">{{$dataU['phone_number']}}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between lh-condensed">
                                    <div>
                                        <h6 class="my-0">Địa chỉ</h6>
                                    </div>
                                    <span class="text-muted">{{$dataU['address']}}</span>
                                <li class="list-group-item d-flex justify-content-between lh-condensed">
                                    <div>
                                        <h6 class="my-0">Ghi chú</h6>
                                    </div>
                                    <span class="text-muted">{{$dataU['note']}}</span>
                                </li>
                            </ul>

                        </div>
                        <br>
                        <h4>Thông tin sản phẩm</h4>
                        <br>
                        <div>
                            <ul class="list-group mb-12">
                                @foreach($data['cart'] as $product)
                                <li class="list-group-item d-flex justify-content-between lh-condensed">
                                    <div>
                                        <h6 class="my-0">{{$product->name}}</h6>
                                        <small class="text-muted">x {{$product->qty}}</small>
                                    </div>
                                    <span class="text-muted">{{number_format($product->price,0,',','.')}} VNĐ</span>
                                </li>
                                @endforeach
                                <li class="list-group-item d-flex justify-content-between bg-light">
                                    <div class="text-success">
                                        <h6 class="my-0">Voucher</h6>
                                        <small class="text-muted">{{$dataU['discount_code']}}</small>
                                    </div>
                                    <span class="text-success">-{{number_format($discount->discount,0,',','.')}} VNĐ</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <span>Total (VNĐ)</span>
                                    <strong>{{number_format(FinalPrice($discount->discount,$data['total']),0,',','.')}} VNĐ</strong>
                                </li>
                            </ul>
                        </div>
                        <div class="submit-form">
                            <div class="total-provisional total-price">
                            </div>
                            <form  action="{{route('purchase')}}" method="post">
                                @csrf
                            <input type="text" value="{{$dataU['discount_code']}}" hidden name="discount_code">
                            <input type="text" value="{{$dataU['full_name']}}" hidden name="full_name">
                            <input type="text" value="{{$dataU['phone_number']}}" hidden name="phone_number">
                            <input type="text" value="{{$dataU['address']}}" hidden name="address">
                            <input type="text" value="{{$dataU['note']}}" hidden name="note">
                            <button type='submit' class="submit-btn">Đặt hàng</button>
                            </form>
                        </div>

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


