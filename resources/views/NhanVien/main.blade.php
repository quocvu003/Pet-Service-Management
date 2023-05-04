<!DOCTYPE html>
<html lang="en">

<head>
    @include('NhanVien.head')

</head>

<body>

    @include('NhanVien.sidebar')
    @include('NhanVien.nav')

    @yield('content')

    @include('NhanVien.footer')


</body>

</html>
