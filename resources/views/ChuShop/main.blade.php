<!DOCTYPE html>
<html lang="en">

<head>
    @include('ChuShop.head')

</head>

<body>

    @include('ChuShop.sidebar')
    @include('ChuShop.nav')

    @yield('content')

    <div class="footer">
        @include('ChuShop.footer')
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
