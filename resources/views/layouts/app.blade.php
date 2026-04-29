<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AL-Shahad</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

<header>

    <div class="header-wrapper">

        <div class="top-bar">
            <span>
                <i class="bi bi-patch-check-fill"></i>
                عسل طبيعي 100%
            </span>

            <span>
                <i class="bi bi-telephone-fill"></i>
                +966000000000
            </span>
        </div>

        <div class="header-main">

            <a href="{{ url('/') }}" class="logo-section">

                <div class="logo-icon">
                    <img src="{{ asset('images/Screenshot 2026-04-28 095301.png') }}"
                         style="width: 75px; height: auto;">
                </div>

                <div class="logo-text">
                    <span class="logo-tagline">أجود أنواع العسل الطبيعي</span>
                </div>

            </a>

            <nav class="nav-links">

                <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">
                    الرئيسية
                </a>

                <a class="nav-link {{ request()->is('bestsellers*') ? 'active' : '' }}" href="{{ url('/bestsellers') }}">
                    الأكثر مبيعاً
                    <i class="bi bi-fire"></i>
                </a>

                <a class="nav-link {{ request()->is('products*') ? 'active' : '' }}" href="{{ url('/products') }}">
                    المنتجات
                    <span class="badge">جديد</span>
                </a>

                <a class="nav-link {{ request()->is('categories*') ? 'active' : '' }}" href="{{ url('/categories') }}">
                    أنواع العسل
                </a>

            </nav>

            <div class="header-actions">

                @guest
                    <a href="{{ url('/login') }}" class="btn-login">
                        <i class="bi bi-person-fill"></i>
                        تسجيل الدخول
                    </a>
                @else
                    <a href="{{ url('/profile') }}" class="btn-login">
                        <i class="bi bi-person-circle"></i>
                        حسابي
                    </a>
                @endguest

                <a href="{{ url('/cart') }}" class="btn-cart">

                    @if(session('cart') && count(session('cart')) > 0)
                        <span class="cart-count">{{ count(session('cart')) }}</span>
                    @endif

                    <i class="bi bi-bag-fill"></i>
                    السلة
                </a>

            </div>

        </div>

        <div class="search-row">

            <div class="search-wrap">

                <form action="{{ url('/search') }}" method="GET">

                    <i class="bi bi-search search-icon"></i>

                    <input class="search-input"
                           type="text"
                           name="q"
                           value="{{ request('q') }}"
                           placeholder="ابحث عن نوع العسل... سدر، طلح"
                           autocomplete="off" />

                    <button type="submit" class="search-btn">
                        <i class="bi bi-search"></i>
                        بحث
                    </button>

                </form>

            </div>

        </div>

    </div>

</header>

<main class="py-4">
    <div class="container">
        @yield('content')
    </div>
</main>

<!-- Footer -->
<footer class="text-center py-3" style="background:#E0D120; color:#2D2800;">

    <div class="container text-center">

        <p>© 2026 جميع الحقوق محفوظة</p>

        <div class="mt-2">
            <a href="#" class="text-light mx-2"><i class="bi bi-facebook"></i></a>
            <a href="#" class="text-light mx-2"><i class="bi bi-instagram"></i></a>
            <a href="#" class="text-light mx-2"><i class="bi bi-twitter-x"></i></a>
            <a href="#" class="text-light mx-2"><i class="bi bi-whatsapp"></i></a>
        </div>

    </div>

</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>