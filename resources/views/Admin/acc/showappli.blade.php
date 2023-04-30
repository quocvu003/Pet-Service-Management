@extends('admin.main')

@section('content')
    <form action="" method="POST">
        <div class="card-body ">
            <label for="menu">Họ và Tên :</label>
            <div class="input-group mb-3">

                <label class="form-control">{{ $acc->ten }}</label>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user"></span>
                    </div>
                </div>
            </div>
            <label for="menu">Ten Shop :</label>
            <div class="input-group mb-3">

                <label class="form-control">{{ $shop->ten }}</label>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user"></span>
                    </div>
                </div>
            </div>
            <label for="menu">Email :</label>
            <div class="input-group mb-3">

                <label class="form-control">{{ $acc->email }}</label>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
            </div>

            <label for="menu">Số điện thoại :</label>
            <div class="input-group mb-3">
                <label class="form-control">{{ $shop->sdt }}</label>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <i class="fas fa-phone"></i>
                    </div>
                </div>
            </div>
            <label for="menu">Địa chỉ :</label>
            <div class="input-group mb-3">
                <label class="form-control">{{ $shop->diachi }}</label>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                </div>
            </div>


            <div class="form-group">
                <label for="menu">Logo :</label>

                <div id="hinhanh_show">
                    <a href="{{ $shop->hinhanh }}" target="_blank">
                        <img src="{{ $shop->hinhanh }}" width="100px">
                    </a>
                </div>
                <input type="hidden" name="hinhanh" value="{{ $shop->hinhanh }}" id="hinhanh01">
            </div>

            <input type="hidden" name="trangthai" value="1">
            <input type="hidden" name="email" value="{{ $acc->email }}">

            <div class="row">

                <!-- /.col -->
                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">Duyệt đơn đăng ký</button>
                </div>
                <!-- /.col -->
            </div>
            @csrf

    </form>
@endsection
@section('footer')
@endsection
