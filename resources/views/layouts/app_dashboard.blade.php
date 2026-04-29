<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة التحكم </title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <style>
        body {
            overflow-x: hidden;
            background-color: #f8f6ef;
            font-family: 'Tajawal', sans-serif;
        }

        #sidebar-wrapper {
            min-height: 100vh;
            width: 250px;
            background: #E0D120 !important;
        }

        .sidebar-heading {
            color: #2D2800;
            border-bottom: 1px solid rgba(45,40,0,0.2);
            padding: 20px;
            font-weight: bold;
        }

        .list-group-item {
            border: none;
            padding: 12px 20px;
            color: #2D2800 !important;
            background: transparent;
            font-weight: 600;
        }

        .list-group-item:hover {
            background: rgba(45,40,0,0.1) !important;
        }

        nav.navbar {
            background: #E0D120 !important;
            border-bottom: 2px solid #B8AB10;
        }

        .navbar-brand,
        nav.navbar span {
            color: #2D2800 !important;
            font-weight: bold;
        }

        #sidebarToggle {
            border: 1px solid #2D2800;
            color: #2D2800;
        }

        #page-content-wrapper {
            flex: 1;
        }

        .card {
            border: none;
            border-radius: 12px;
        }

        footer {
            background: #E0D120;
            color: #2D2800;
            border-top: 2px solid #B8AB10;
        }

        footer a {
            color: #2D2800;
            font-size: 18px;
        }
    </style>
</head>

<body>

<header class="sticky-top">
    <nav class="navbar shadow-sm">
        <div class="container-fluid">
            <button class="btn" id="sidebarToggle">
                <i class="bi bi-list"></i>
            </button>
            <a class="navbar-brand" href="#">
                <img src="{{ asset('images/Screenshot 2026-04-28 095301.png') }}"
                     style="height:50px;">
            </a>


        </div>
    </nav>
</header>

<main class="d-flex">
    <div id="sidebar-wrapper">
        <div class="sidebar-heading">
            لوحة التحكم 
        </div>
        <div class="list-group">
            <a href="{{ route('dashboard') }}" class="list-group-item">
                الإحصائيات
            </a>

            <a href="{{ route('dashboard.product') }}" class="list-group-item">
                المنتجات
            </a>

            <a href="{{ route('dashboard.details') }}" class="list-group-item">
                تفاصيل المنتج
            </a>

            {{-- <a href="{{ route('add_employee') }}" class="list-group-item">
                إضافة موظف
            </a> --}}

            {{-- <a href="#" class="list-group-item text-danger"
               onclick="event.preventDefault(); document.getElementById('logout').submit();">
                تسجيل الخروج
            </a> 
            
             <form id="logout" method="POST" action="{{ route('logout') }}">
                @csrf
                --}}

           
            </form>

        </div>

    </div>

    <div id="page-content-wrapper" class="p-4">

        <div class="card p-4 shadow-sm">
            @yield('content')
        </div>

    </div>

</main>

<footer class="text-center py-3 mt-4">

    <p>© 2026 جميع الحقوق محفوظة | عسلنا</p>

    <div>

        <a href="#" class="mx-2"><i class="bi bi-facebook"></i></a>
        <a href="#" class="mx-2"><i class="bi bi-instagram"></i></a>
        <a href="#" class="mx-2"><i class="bi bi-twitter-x"></i></a>
        <a href="#" class="mx-2"><i class="bi bi-whatsapp"></i></a>

    </div>

</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    document.getElementById('sidebarToggle').addEventListener('click', function () {
        document.getElementById('sidebar-wrapper').classList.toggle('d-none');
    });
</script>

</body>
</html>