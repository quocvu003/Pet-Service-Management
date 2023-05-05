<!DOCTYPE html>
<html lang="en">

<head>
    @include('user.head')
</head>

<body> /

    <!-- Header -->
    @include('user.nav')

    <!-- Cart -->
    @include('user.cart')








    @yield('content')
    <!-- Footer -->
    @include('user.footer')
</body>

</html>
