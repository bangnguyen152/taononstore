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
                                    <span class="order-item__rate">Đánh giá</span>
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
                                                <span class="order-item__quantity">x1</span>
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
<div class="modal modal-js">
    <div class="modal__container">
        <div class="modal__rate">
            <span class="modal__rate-title">Đánh giá sản phẩm</span>
            <form action="{{route('comment',$product->product_id)}}" method="post">
            <ul class="rate__star-list">
                <li class="rate__star-each">
                    <svg viewBox="0 0 30 30" class="star-solid" style="width: 100%">
                        <defs>
                            <linearGradient
                                id="star__solid"
                                x1="50%"
                                x2="50%"
                                y1="0%"
                                y2="100%"
                            >
                                <stop offset="0%" stop-color="#FFCA11"></stop>
                                <stop offset="100%" stop-color="#FFAD27"></stop>
                            </linearGradient>
                        </defs>
                        <path
                            fill="url(#star__solid)"
                            fill-rule="evenodd"
                            d="M14.9988798 25.032153l-8.522024 4.7551739c-.4785069.2670004-.7939037.0347448-.7072938-.5012115l1.6339124-10.1109185-6.8944622-7.1327607c-.3871203-.4005006-.2499178-.7947292.2865507-.8774654l9.5090982-1.46652789L14.5740199.51703028c.2346436-.50460972.6146928-.50543408.8497197 0l4.2693588 9.18141263 9.5090986 1.46652789c.545377.0841102.680337.4700675.28655.8774654l-6.894462 7.1327607 1.633912 10.1109185c.08788.5438118-.232337.7662309-.707293.5012115l-8.5220242-4.7551739z"
                        ></path>
                    </svg>
                </li>
                <li class="rate__star-each">
                    <svg viewBox="0 0 30 30" class="star-regular">
                        <defs>
                            <linearGradient
                                id="star__hollow"
                                x1="50%"
                                x2="50%"
                                y1="0%"
                                y2="99.0177926%"
                            >
                                <stop offset="0%" stop-color="#FFD211"></stop>
                                <stop offset="100%" stop-color="#FFAD27"></stop>
                            </linearGradient>
                        </defs>
                        <path
                            fill="none"
                            fill-rule="evenodd"
                            stroke="url(#star__hollow)"
                            stroke-width="2"
                            d="M23.226809 28.390899l-1.543364-9.5505903 6.600997-6.8291523-9.116272-1.4059447-4.01304-8.63019038-4.013041 8.63019038-9.116271 1.4059447 6.600997 6.8291523-1.543364 9.5505903 8.071679-4.5038874 8.071679 4.5038874z"
                        ></path>
                    </svg>
                </li>
                <li class="rate__star-each">
                    <svg viewBox="0 0 30 30" class="star-regular">
                        <defs>
                            <linearGradient
                                id="star__hollow"
                                x1="50%"
                                x2="50%"
                                y1="0%"
                                y2="99.0177926%"
                            >
                                <stop offset="0%" stop-color="#FFD211"></stop>
                                <stop offset="100%" stop-color="#FFAD27"></stop>
                            </linearGradient>
                        </defs>
                        <path
                            fill="none"
                            fill-rule="evenodd"
                            stroke="url(#star__hollow)"
                            stroke-width="2"
                            d="M23.226809 28.390899l-1.543364-9.5505903 6.600997-6.8291523-9.116272-1.4059447-4.01304-8.63019038-4.013041 8.63019038-9.116271 1.4059447 6.600997 6.8291523-1.543364 9.5505903 8.071679-4.5038874 8.071679 4.5038874z"
                        ></path>
                    </svg>
                </li>
                <li class="rate__star-each">
                    <svg viewBox="0 0 30 30" class="star-regular">
                        <defs>
                            <linearGradient
                                id="star__hollow"
                                x1="50%"
                                x2="50%"
                                y1="0%"
                                y2="99.0177926%"
                            >
                                <stop offset="0%" stop-color="#FFD211"></stop>
                                <stop offset="100%" stop-color="#FFAD27"></stop>
                            </linearGradient>
                        </defs>
                        <path
                            fill="none"
                            fill-rule="evenodd"
                            stroke="url(#star__hollow)"
                            stroke-width="2"
                            d="M23.226809 28.390899l-1.543364-9.5505903 6.600997-6.8291523-9.116272-1.4059447-4.01304-8.63019038-4.013041 8.63019038-9.116271 1.4059447 6.600997 6.8291523-1.543364 9.5505903 8.071679-4.5038874 8.071679 4.5038874z"
                        ></path>
                    </svg>
                </li>
                <li class="rate__star-each">
                    <svg viewBox="0 0 30 30" class="star-regular">
                        <defs>
                            <linearGradient
                                id="star__hollow"
                                x1="50%"
                                x2="50%"
                                y1="0%"
                                y2="99.0177926%"
                            >
                                <stop offset="0%" stop-color="#FFD211"></stop>
                                <stop offset="100%" stop-color="#FFAD27"></stop>
                            </linearGradient>
                        </defs>
                        <path
                            fill="none"
                            fill-rule="evenodd"
                            stroke="url(#star__hollow)"
                            stroke-width="2"
                            d="M23.226809 28.390899l-1.543364-9.5505903 6.600997-6.8291523-9.116272-1.4059447-4.01304-8.63019038-4.013041 8.63019038-9.116271 1.4059447 6.600997 6.8291523-1.543364 9.5505903 8.071679-4.5038874 8.071679 4.5038874z"
                        ></path>
                    </svg>
                </li>
            </ul>
            </form>
        </div>
        <div class="modal__comment">
            <input type="text" class="modal__comment-input" placeholder="Chia sẻ về trải nghiệm của bạn tại đây nha" name="commnet">
        </div>
        <div class="modal__control">
            <button class="modal__control-back">Trở lại</button>
            <button class="modal__control-submit">Đánh giá</button>
        </div>
    </div>
</div>
<script>
    const modalEl = document.querySelector(".modal-js")
    const rateBtnEl = document.querySelector(".order-item__rate")

    const controlBackEl = document.querySelector(".modal__control-back")
    const controlSubmitEl = document.querySelector(".modal__control-submit")
    const modalStarsEl = document.querySelectorAll(".rate__star-each")
    const openModal = function () {
        modalEl.classList.add("open")
    }
    const closeModal = function () {
        if(modalEl.classList.contains("open"))
        {
            modalEl.classList.remove("open")

        }
    }
    rateBtnEl.addEventListener("click", function() {
        modalEl.classList.add("open")

    })
    controlBackEl.addEventListener("click", closeModal)
    controlSubmitEl.addEventListener("click", closeModal)
</script>
</body>
</html>
