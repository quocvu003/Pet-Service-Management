<!DOCTYPE html>
<html lang="en">

<head>
    @include('NhanVien.head')

</head>

<body>

    @include('NhanVien.sidebar')
    @include('NhanVien.nav')

    @yield('content')
    <div class="footer">
        @include('NhanVien.footer')

    </div>


</body>

</html>
<style>
    html {
        position: relative;
        min-height: 100%;
    }

    body {
        margin-bottom: 60px;
        /* Chiều cao của footer */
    }

    .footer {
        position: absolute;
        bottom: 0;
        width: 100%;
        height: 60px;
        /* Chiều cao của footer */
        background-color: #f5f5f5;
    }
</style>
