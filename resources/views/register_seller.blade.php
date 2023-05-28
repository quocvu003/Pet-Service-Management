@include('admin.head')
<section class="background-radial-gradient overflow-hidden">
    <style>
        .background-radial-gradient {
            background-color: hsl(218, 41%, 15%);
            background-image: radial-gradient(650px circle at 0% 0%,
                    hsl(218, 41%, 35%) 15%,
                    hsl(218, 41%, 30%) 35%,
                    hsl(218, 41%, 20%) 75%,
                    hsl(218, 41%, 19%) 80%,
                    transparent 100%),
                radial-gradient(1250px circle at 100% 100%,
                    hsl(218, 41%, 45%) 15%,
                    hsl(218, 41%, 30%) 35%,
                    hsl(218, 41%, 20%) 75%,
                    hsl(218, 41%, 19%) 80%,
                    transparent 100%);
        }

        #radius-shape-1 {
            height: 220px;
            width: 220px;
            top: -60px;
            left: -130px;
            background: radial-gradient(#44006b, #ad1fff);
            overflow: hidden;
        }

        #radius-shape-2 {
            border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
            bottom: -60px;
            right: -110px;
            width: 300px;
            height: 300px;
            background: radial-gradient(#44006b, #ad1fff);
            overflow: hidden;
        }

        .bg-glass {
            background-color: hsla(0, 0%, 100%, 0.9) !important;
            backdrop-filter: saturate(200%) blur(25px);
        }
    </style>

    <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
        <div class="row gx-lg-5 align-items-center mb-5">
            <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10;margin-top: -600px;">
                <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 75%)">
                    <span style="color: red">Petcare</span> Shop<br />
                    <span style="color: hsl(218, 81%, 75%)">Tăng trưởng doanh thu dịch vụ cùng <span
                            style="color: red">Petcare</span> ngay hôm nay!</span>
                </h1>
                <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">

                </p>
            </div>

            <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
                <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
                <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

                <div class="card bg-glass">
                    <div class="card-body px-4 py-5 px-md-5">
                        <div style="display: flex">
                            <img src="template/chuShop/assets/img/vv.png" alt=""
                                style="width: 70px;display: inline-block;margin-top: -20px">
                            <h6 style="display: inline-block;width: 100%"> Bắt đầu bằng cách cho chúng tôi biết về
                                Shop của bạn
                            </h6>
                        </div>
                        <p style="font-size: 14px">Vì mục đích tuân thủ, chúng tôi có thể sẽ xác minh thông tin Shop của
                            bạn. Thông tin này sẽ
                            không bao giờ được hiển thị công khai trên nền tảng này.</p>


                    </div>
                </div>
                <div class="card
                            bg-glass">
                    <div class="card-body px-4 py-5 px-md-5">
                        @include('admin.alert')
                        <form action="register_seller_action" class="mt-4" method="POST">
                            <div class="form-outline mb-4">
                                <label class="form-label" for="form3Example4">Chủ Sở Hữu</label>

                                <input type="text" id="form3Example4" class="form-control" name="name"
                                    placeholder="Nhập tên " />

                            </div>
                            <div class="form-outline mb-4">
                                <label class="form-label" for="form3Example3">Email</label>
                                <input type="email" id="form3Example3" class="form-control" name="email"
                                    placeholder="Nhập email" />
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="form3Example4">Mật Khẩu</label>
                                <input type="password" id="form3Example4" class="form-control" name="password"
                                    placeholder=" Nhập mật khẩu" />
                            </div>
                            <div class="form-outline mb-4">
                                <label class="form-label" for="form3Example4"> Xác Nhận Mật Khẩu</label>
                                <input type="password" id="form3Example4" class="form-control" name="confirm_password"
                                    placeholder=" Nhập xác nhận mật khẩu" />
                            </div>

                            <div class="form-outline mb-4">
                                <label class="form-label" for="form3Example4">Tên Shop</label>
                                <p style="font-size: 14px">Vui lòng không sử dụng bất kỳ ký tự nước ngoài nào
                                    ngoài ký tự tiếng Anh.</p>
                                <input type="text" id="form3Example4" class="form-control" name="nameshop"
                                    placeholder="Nhập tên Shop" />

                            </div>
                            <div class="form-outline mb-4">
                                <label class="form-label" for="form3Example3">Logo</label>

                                <input type="file" id="hinhanh" class="form-control" />
                                <div id="hinhanh_show">
                                </div>
                                <input type="hidden" name="hinhanh" id="hinhanh01">
                            </div>
                            <div class="form-outline mb-4">
                                <label class="form-label" for="form3Example3">Số điện thoại Shop</label>
                                <input type="text" id="sdt" class="form-control" name="sdtshop"
                                    placeholder="Nhập số điện thoại di động" />
                            </div>





                            <div class="form-outline mb-4">
                                <label class="form-label" for="form3Example3">Địa chỉ Shop</label>
                                <input type="text" id="daiChi" class="form-control" placeholder="Nhập địa chỉ"
                                    name="diachishop" />
                            </div>



                            <!-- Submit button -->
                            <button type="submit" class="btn btn-primary btn-block mb-4">
                                GỬI
                            </button>
                            <div class="text-center">
                                <span class="fw-normal">
                                    Bạn đã có tài khoản ?
                                    <a href="/login" class="fw-bold" style="color: black">Đăng nhập</a>
                                </span>
                            </div>

                            @csrf
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('admin.footer')
