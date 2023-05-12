<!DOCTYPE html>
<html lang="en">

<head>
    @include('user.head')
</head>

<body> /

    <!-- Header -->
    @include('user.nav')

    @yield('content')
    <!-- Footer -->
    @include('user.footer')
</body>

</html>
