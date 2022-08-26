<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Táo non</title>
    <link rel="stylesheet" href="{{asset('assets/css/base.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/user.css')}}" />

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
        <div class="grid">
            <div class="grid__row">
                <div class="grid__col--2 infor-user-wrap">
                    <div class="infor-user">
                        <form action="{{route("profile.update",session()->get('id'))}}" method="post" >
                            @csrf
                        <span class="infor-persional-title">Thông tin cá nhân</span>
                        <div class="infor-persional">
                            <div class="infor-persional-form">
                                <div class="form-infor">
                                    <div class="form-avt">
                                        <img
                                            src="https://frontend.tikicdn.com/_desktop-next/static/img/account/avatar.png"
                                            alt=""
                                            class="form-avt__img"
                                        />
                                    </div>

                                </div>
                                <div class="form-infor">
                                    <div class="form-input">
                                        <div class="form-input-wrap">
                                            <label for="" class="form-input__label">Họ và tên</label>
                                            <input type="text" class="form-input__input" value="{{$user->full_name}}" name="full_name"/>
                                        </div>
                                        <div class="form-input-wrap">
                                            <label for="" class="form-input__label">Số điện thoại</label>
                                            <input type="tel" class="form-input__input" value="{{$user->phone_number}}" name="phone_number" />
                                        </div>
                                        <div class="form-input-wrap">
                                            <label for="" class="form-input__label">Email</label>
                                            <input type="email" class="form-input__input"  value="{{$user->email}}" disabled/>
                                        </div>
                                        <div class="form-input-wrap">
                                            <label for="" class="form-input__label">Địa chỉ</label>
                                            <input type="text" class="form-input__input" value="{{$user->address}}" name="address" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="submit-btn ">Lưu thay đổi</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="grid__row">
            <div class="grid__col--2 change-pass-wrap">
                <span class="infor-persional-title">Đổi mật khẩu</span>

                <form action="{{route('password.update',session()->get('id'))}}" method="post" class="change-password-form" >
                    @csrf
                    <input
                        type="password"
                        class="change-password-input"
                        name="current-password"
                        placeholder="Mật khẩu hiện tại"
                    />

                <div  class="change-password-form">
                    <input type="password" class="change-password-input" placeholder="Mật khẩu mới" name="new_password"/>
                </div>
                <div  class="change-password-form">
                    <input type="password" class="change-password-input" placeholder="Nhập lại mật khẩu mới"/>
                </div>
                <button class="submit-btn ">Lưu thay đổi</button>
                </form>
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                @if(session()->has('alert'))
                    <div class="alert alert-danger">
                        {{ session()->get('alert') }}
                    </div>
                @endif
            </div>
        </div>
        <div class="grid__row">
            <div class="grid__col--2">
            </div>
        </div>
    </div>
</div>
</body>
</html>
