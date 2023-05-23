@extends('admin.main')

@section('content')
    <style>
        .card-body div {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            margin-left: 300px;
        }

        .card-body div span {
            margin-right: 10px;
            width: 30px;
            text-align: center;
        }

        .card-body div label {
            margin: 0;
        }

        .col-4 {
            text-align: right;
        }

        #hinhanh_show {
            display: flex;
            justify-content: center;
        }
    </style>
    <form action="" method="POST">
        <div class="card-body ">

            <div>
                <span class="icon"><i class="fas fa-user-circle"></i></i></span>
                <label for="menu">Logo :
                    <a href="{{ $shops->hinhanh }}" target="_blank">
                        <img src="{{ $shops->hinhanh }}" width="150px">
                    </a>
                </label>


                <input type="hidden" name="hinhanh" value="{{ $shops->hinhanh }}" id="hinhanh01">
            </div>
            <div>
                <span class="icon"><i class="fas fa-user"></i></span>
                <label for="menu">Chủ sở hữu: {{ $acc->ten }}</label>
                <input type="hidden" name="ten" value="{{ $acc->ten }}">
            </div>
            <div>
                <span class="icon"><i class="fas fa-store"></i></span>
                <label for="menu">Ten shop : {{ $acc->shops->ten }}</label>
            </div>

            <div>
                <span class="icon"><i class="fas fa-envelope"></i></span>
                <label for="menu">Email : {{ $acc->email }}</label>
            </div>

            <div>
                <span class="icon"><i class="fas fa-phone"></i></span>
                <label for="menu">Số điện thoại : {{ $shops->sdt }}</label>
            </div>

            <div>
                <span class="icon"><i class="fas fa-map-marker-alt"></i></span>
                <label for="menu">Địa chỉ : {{ $shops->diachi }}</label>
            </div>
        </div>
        <input type="hidden" name="trangthai" value="1">
        <input type="hidden" name="email" value="{{ $acc->email }}">
        </div>

        <div class="row" style="margin-left: 300px">

            <!-- /.col -->
            <div class="col-3">
                <button type="submit" class="btn btn-primary btn-block">Duyệt đơn đăng ký</button>
            </div>
            <div class="col-3">
                <a href="/admin/accs/application">
                    <button type="button" class="btn btn-danger btn-block">Quay lại</button>
                </a>
            </div>
        </div>
        <!-- /.col -->
        @csrf
    </form>
@endsection
@section('footer')
@endsection
