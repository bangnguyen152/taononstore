<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Táo non</title>
    <link rel="stylesheet" href="{{asset('assets/css/base.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/home.css')}}" />

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
    <div id="slider">
        <img src="./assets/img/slider/slider1.png" alt="" />
    </div>

    <!-- policy -->
    <div id="policy">
        <ul class="pr-policy">
            <li>
                <i class="diverity-icon ti-arrow-circle-down"></i>
                <span>
              Mẫu mã đa dạng,
              <br />
              chính hãng
            </span>
            </li>
            <li>
                <i class="diverity-icon ti-truck"></i>
                <span> Giao hàng toàn quốc </span>
            </li>
            <li>
                <i class="diverity-icon ti-shield"></i>
                <span>
              Bảo hành có cam kết
              <br />
              tới 12 tháng
            </span>
            </li>
            <li>
                <i class="diverity-icon ti-back-left"></i>
                <span> Có thể đổi trả </span>
            </li>
        </ul>
        <div class="clear"></div>
    </div>

    <!-- product -->
    <div id="wrapper-product">
        <!-- choose cate -->
        <div id="choose-category-box">
            <ul class="choose-category">
                <li>
                    <a href="{{route('iphone')}}">
                        <div class="img-cate img-category-iphone">
                            <img
                                src="./assets/img/catetory-product/img-cateiphone.png"
                                alt=""
                            />
                        </div>
                        <span>iPhone</span>
                    </a>
                </li>
                <li>
                    <a href="/mac">
                        <div class="img-cate img-category-mac">
                            <img
                                src="./assets/img/catetory-product/img-catemac.png"
                                alt=""
                            />
                        </div>
                        <span>Mac</span>
                    </a>
                </li>
                <li>
                    <a href="/ipad">
                        <div class="img-cate img-category-ipad">
                            <img
                                src="./assets/img/catetory-product/img-cateipad.png"
                                alt=""
                            />
                        </div>
                        <span>iPad</span>
                    </a>
                </li>
                <li>
                    <a href="/watch">
                        <div class="img-cate img-category-watch">
                            <img
                                src="./assets/img/catetory-product/img-catewatch.png"
                                alt=""
                            />
                        </div>
                        <span>Watch</span>
                    </a>
                </li>
                <li>
                    <a href="/sound">
                        <div class="img-cate img-category-sound">
                            <img
                                src="./assets/img/catetory-product/img-catesound.png"
                                alt=""
                            />
                        </div>
                        <span>Âm thanh</span>
                    </a>
                </li>
                <li>
                    <a href="/acessory">
                        <div class="img-cate img-category-acessory">
                            <img
                                src="./assets/img/catetory-product/img-catephukien.png"
                                alt=""
                            />
                        </div>
                        <span>Phụ kiện</span>
                    </a>
                </li>
            </ul>
            <div class="clear"></div>
        </div>

        <!-- iphone product -->
        <div class="box-product-slide">
            <a href="iphone" class="logo-category">
                <img src="{{asset('assets/img/product-icon/iphone-icon.png')}}" alt="" />
            </a>

            <div class="slide-cate">
                <ul class="slide-cate-product">
                    @foreach($iphones as $iphone)
                    <li>

                        <a class="product-model" href="{{route('product.detail',$iphone->id)}}">
                            <img
                                class="product-img"
                                src="{{$iphone->photo}}"
                                alt=""
                            />
                            <p class="name-product">{{$iphone->title}}</p>
                            <h4 class="price-product">{{number_format($iphone->price,0,',','.')}}đ</h4>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="clear"></div>
        </div>
        <!-- mac product -->
        <div class="box-product-slide">
            <a href="{{route('mac')}}" class="logo-category">
                <img src="./assets/img/product-icon/mac-icon.png" alt="" />
            </a>

            <div class="slide-cate">
                <ul class="slide-cate-product">
                    @foreach($macs as $mac)
                    <li>
                        <a class="product-model" href="{{route('product.detail',$mac->id)}}">
                            <img
                                class="product-img"
                                src="{{$mac->photo}}"
                                alt=""
                            />
                            <p class="name-product">{{$mac->title}}</p>
                            <h4 class="price-product">{{number_format($mac->price,0,',','.')}}đ</h4>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="clear"></div>
        </div>
        <!-- ipad product -->
        <div class="box-product-slide">
            <a href="{{route('ipad')}}" class="logo-category">
                <img src="./assets/img/product-icon/ipad-icon.png" alt="" />
            </a>

            <div class="slide-cate">
                <ul class="slide-cate-product">
                    @foreach($ipads as $ipad)
                    <li>
                        <a class="product-model" href="{{route('product.detail',$ipad->id)}}">
                            <img
                                class="product-img"
                                src="{{$ipad->photo}}"
                                alt=""
                            />
                            <p class="name-product">{{$ipad->title}}</p>
                            <h4 class="price-product">{{number_format($ipad->price,0,',','.')}}đ</h4>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="clear"></div>
        </div>
        <!-- watch product -->
        <div class="box-product-slide">
            <a href="{{route('watch')}}" class="logo-category">
                <img src="./assets/img/product-icon/watch-icon.png" alt="" />
            </a>

            <div class="slide-cate">
                <ul class="slide-cate-product">
                    @foreach($watches as $watch)
                    <li>
                        <a class="product-model" href="{{route('product.detail',$watch->id)}}">
                            <img
                                class="product-img"
                                src="{{$watch->photo}}"
                                alt=""
                            />
                            <p class="name-product">{{$watch->title}}</p>
                            <h4 class="price-product">{{number_format($watch->price,0,',','.')}}đ</h4>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="clear"></div>
        </div>
        <!-- sound product -->
        <div class="box-product-slide">
            <a href="{{route('amthanh')}}" class="logo-category">
                <img src="./assets/img/product-icon/sound-icon.png" alt="" />
            </a>
            <div class="slide-cate">
                <ul class="slide-cate-product">
                    @foreach($airpods as $airpod)
                    <li>
                        <a class="product-model" href="{{route('product.detail',$airpod->id)}}">
                            <img
                                class="product-img"
                                src="{{$airpod->photo}}"
                                alt=""
                            />
                            <p class="name-product">{{$airpod->title}}</p>
                            <h4 class="price-product">{{number_format($airpod->price,0,',','.')}}đ</h4>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="clear"></div>
        </div>
        <!-- acessory product -->
        <div class="box-product-slide">
            <a href="{{route('phukien')}}" class="logo-category">
                <img src="./assets/img/product-icon/acessory-icon.png" alt="" />
            </a>

            <div class="slide-cate">
                <ul class="slide-cate-product">
                    @foreach($accessories as $accessory)
                    <li>
                        <a class="product-model" href="{{route('product.detail',$accessory->id)}}">
                            <img
                                class="product-img"
                                src="{{$accessory->photo}}"
                                alt=""
                            />
                            <p class="name-product">{{$accessory->title}}</p>
                            <h4 class="price-product">{{number_format($accessory->price,0,',','.')}}đ</h4>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <script>
        const modalSearch = document.querySelector('.modal-search');
        const searchBtn = document.querySelector('.nav-btn__search');
        const closeSearchBtn = document.querySelector('.search-close');
        searchBtn.addEventListener('click', () => {
            modalSearch.classList.remove('hidden')
        })
        closeSearchBtn.addEventListener('click', () => {
            modalSearch.classList.add('hidden')
        })
    </script>
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

