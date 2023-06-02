@extends('admin.main')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
    <form action="" method="POST">
        <div class="card-body ">
            <label for="menu">Họ và Tên</label>
            <div class="input-group mb-3">
                <input type="text" name="ten" class="form-control" placeholder="Nhập Họ và Tên">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user"></span>
                    </div>
                </div>
            </div>
            <label for="menu">Email</label>
            <div class="input-group mb-3">
                <input type="email" name="email"class="form-control" placeholder="Email">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
            </div>
            <label for="menu">Mật Khẩu</label>
            <div class="input-group mb-3">

                <input type="password" id="password" name="password" class="form-control" placeholder="Mật Khẩu">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span id="toggle-password" class="toggle-password" onclick="togglePasswordVisibility()">
                            <i class="fas fa-eye-slash"></i></span>
                    </div>
                </div>
            </div>
            <label for="menu">Xác Nhận Mật Khẩu</label>
            <div class="input-group mb-3">
                <input type="password" id="password2" name="password_confirmation"class="form-control"
                    placeholder="Nhập Lại Mật Khẩu">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span id="toggle-password2" class="toggle-password" onclick="togglePasswordVisibility2()">
                            <i class="fas fa-eye-slash"></i></span>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>Phân Quyền</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio" id="admin" name="role_id" value="1" checked>
                    <label class="custom-control-label" for="admin">Admin</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio" id="chushop" name="role_id" value="2">
                    <label class="custom-control-label" for="chushop">Chủ Shop</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio" id="khachhang" name="role_id" value="3">
                    <label class="custom-control-label" for="khachhang">Khách hàng</label>
                </div>


            </div>
            <div class="row">

                <!-- /.col -->
                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">Thêm tài khoản</button>
                </div>
                <!-- /.col -->
            </div>
            @csrf






    </form>
@endsection
@section('footer')
@endsection
