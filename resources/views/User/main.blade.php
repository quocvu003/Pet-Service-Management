<!DOCTYPE html>
<html lang="en">

<head>
    @include('user.head')
</head>

<body>


    @include('user.nav')
    <div class='content-container'>
        @yield('content')
    </div>

    <!-- Footer -->

    <div class="footer">
        @include('user.footer')
    </div>


</body>

</html>
<style>
    html {
        /* position: relative; */
        /* min-height: 100%; */
    }

    body {
        margin-bottom: 60px;
        /* Chiều cao của footer */
    }

    .content-container {
        min-height: 700px
    }

    /* .footer {
        position: absolute;
        bottom: 0;
        width: 100%;
        height: 60px;
        /* Chiều cao của footer */
    /* background-color: #f5f5f5; */
    /* } */

    */
</style>
