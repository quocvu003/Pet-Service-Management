<!DOCTYPE html>
<html lang="en">

<head>
    @include('ChuShop.head')

</head>

<body>

    <!-- NOTICE: You can use the _analytics.html partial to include production code specific code & trackers -->


    <main>

        <!-- Section -->
        <section class="vh-lg-100 mt-5 mt-lg-0 bg-soft d-flex align-items-center">
            <div class="container">

                <div class="row justify-content-center form-bg-image"
                    data-background-lg="/template/chuShop/assets/img/illustrations/signin.svg">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <div class="shadow border-0 rounded border-light p-4 p-lg-5 w-100 fmxw-500"
                            style="background-color: rgb(255, 255, 255);border-style: solid">
                            <div class="text-center text-md-center mb-4 mt-md-0">
                                <h1 class="mb-0 h3">ĐĂNG KÝ</h1>
                            </div>
                            @include('admin.alert')
                            <form action="register_action" class="mt-4" method="POST">
                                <!-- Form -->
                                <div class="form-group mb-4">
                                    <label for="email">Họ và Tên</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1">
                                            <i class="fas fa-user"></i>
                                        </span>
                                        <input type="text" class="form-control" value="{{ old('ten') }}"
                                            placeholder="Nhập Họ và Tên" id="name" name="name" autofocus>
                                    </div>
                                    <label for="email">Email</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1">
                                            <i class="fas fa-envelope"></i>
                                        </span>
                                        <input type="email" class="form-control"value="{{ old('email') }}"
                                            placeholder="Nhập Email" id="email" name="email" autofocus>
                                    </div>
                                </div>
                                <!-- End of Form -->
                                <div class="form-group">
                                    <!-- Form -->
                                    <div class="form-group mb-4">
                                        <label for="password">Mật Khẩu</label>
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon2">
                                                <i class="fas fa-lock"></i>
                                            </span>
                                            <input type="password" placeholder="Nhập Mật Khẩu" class="form-control"
                                                id="password" name="password">
                                        </div>
                                    </div>
                                    <!-- End of Form -->
                                    <!-- Form -->
                                    <div class="form-group mb-4">
                                        <label for="confirm_password">Xác Nhận Mật Khẩu</label>
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon2">
                                                <i class="fas fa-lock-open"></i>
                                            </span>
                                            <input type="password" placeholder="Nhập Lại Mật Khẩu" class="form-control"
                                                id="confirm_password" name="confirm_password">
                                        </div>
                                    </div>
                                    <!-- End of Form -->
                                    <div class="mb-4">
                                        <span class="fw-normal">
                                            Bạn là Shop chăm sóc thú
                                            cưng ?
                                            <a href="/register_seller" class="fw-bold"> Đăng ký ngay nào!</a>
                                        </span>
                                    </div>
                                </div>
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-gray-800">ĐĂNG KÝ</button>
                                </div>
                                @csrf
                            </form>

                            <div class="d-flex justify-content-center align-items-center mt-4">
                                <span class="fw-normal">
                                    Bạn đã có tài khoản ?
                                    <a href="/login" class="fw-bold">Đăng nhập</a>
                                </span>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    @include('ChuShop.footer')



</body>

</html>
