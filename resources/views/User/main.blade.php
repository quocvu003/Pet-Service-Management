<!DOCTYPE html>
<html lang="en">

<head>
    @include('user.head')
</head>

<body>


    @include('user.nav')

    @yield('content')
    <!-- Footer -->
    @include('user.footer')
</body>

</html>
