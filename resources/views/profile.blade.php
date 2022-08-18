<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Táo non</title>
    <link rel="stylesheet" href="{{asset('assets/css/base.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/home.css')}}" />
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
            <div class="nav-btn__cart">
                <a href="{{route('cart')}}">
                    <i class="nav-icon ti-shopping-cart"></i>
                </a>
                <div class="cart__quantity">{{\Cart::count()}}</div>
            </div>
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
                                    <div class="form-name">
                                        <div class="form-name-wrap">
                                            <label for="" class="form-name__label"
                                            >Họ và tên</label
                                            >
                                            <input type="text" class="form-name__input" value="{{session()->get('full_name')}}"/>
                                        </div>
                                        <div class="form-name-wrap">
                                            <label for="" class="form-name__label"
                                            >Email</label
                                            >
                                            <input type="text" class="form-name__input" value="{{session()->get('full_name')}}"/>
                                        </div>
                                        <div class="form-name-wrap">
                                            <label for="" class="form-name__label"
                                            >Điện Thoại</label
                                            >
                                            <input type="text" class="form-name__input" value="{{session()->get('full_name')}}"/>
                                        </div>
                                        <div class="form-name-wrap">
                                            <label for="" class="form-name__label"
                                            >Địa chỉ</label
                                            >
                                            <input type="text" class="form-name__input" value="{{session()->get('full_name')}}"/>
                                        </div>
{{--                                        <div class="form-name-wrap">--}}
{{--                                            <label for="" class="form-name__label"--}}
{{--                                            >Nickname</label--}}
{{--                                            >--}}
{{--                                            <input type="text" class="form-name__input" />--}}
{{--                                        </div>--}}
                                    </div>
                                </div>
{{--                                <div class="form-infor">--}}
{{--                                    <div class="form-birthday">--}}
{{--                                        <div class="form-name-wrap">--}}
{{--                                            <label for="" class="form-name__label"--}}
{{--                                            >Ngày sinh</label--}}
{{--                                            >--}}
{{--                                            <input type="date" class="form-name__input" />--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="form-sex">--}}
{{--                                        <div class="form-name-wrap">--}}
{{--                                            <input type="radio" class="form-name__input-gender" name="gender-input" id="gender-male" value="Nam"/>--}}
{{--                                            <label for="gender-male">Nam</label>--}}
{{--                                            <input type="radio" class="form-name__input-gender"  name="gender-input" id="gender-female" value="Nữ"/>--}}
{{--                                            <label for="gender-female">Nữ</label>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid__row">
                <div class="grid__col--2 change-pass-wrap">
                    <span class="infor-persional-title">Đổi mật khẩu</span>
                    @if($errors->any())
                        <h4>{{$errors->first()}}</h4>
                    @endif
                    <form action="{{route('profile.update',session()->get('id'))}}" class="change-password-form" method="post">
                        @csrf
                        <input
                            type="password"
                            class="change-password-input"
                            name="current-password"
                            placeholder="Mật khẩu hiện tại"
                        />

                    <div  class="change-password-form">
                        <input type="password" class="change-password-input" placeholder="Mật khẩu mới" />
                    </div>
                    <div class="change-password-form">
                        <input type="password" class="change-password-input" placeholder="Nhập lại mật khẩu mới" name="new_password"/>
                    </div>
                    <button class="submit-btn " type="submit">Lưu thay đổi</button>
                    </form>
                </div>
            </div>
            <div class="grid__row">
                <div class="grid__col--2">
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
