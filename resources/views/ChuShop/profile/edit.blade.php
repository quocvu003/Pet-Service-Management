@extends('ChuShop.main')
@section('content')
    <main class="content">
        <form action="" method="POST">

            <div class="row">
                <div class="col-12 mb-4">
                    <div class="card shadow border-0 text-center p-0">
                        <div class="profile-cover rounded-top" style="background-color: #1F2937">
                        </div>
                        <div class="avatar-xl rounded-circle mx-auto mt-n7 mb-4" id="hinhanh_show">
                            <img src="{{ $shop->hinhanh }} ">
                        </div>
                        <input type="file" id="hinhanh" class="form-control"
                            style="width: 90px;display: block; margin: 0 auto;" />
                        <h1>{{ $shop->ten }}</h1>

                    </div>
                </div>
            </div>





            <input type="hidden" name="hinhanh" value="{{ $shop->hinhanh }}" id="hinhanh01">




            <div class="card card-body border-0 shadow mb-4">
                <h2 class="h5 mb-4">Thông tin chung</h2>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div>
                            <label for="first_name">Chủ Sở Hữu</label>
                            <input class="form-control" type="text" name="ten" value="{{ $user->ten }}">
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div>
                            <label for="last_name">Tên Shop</label>
                            <input class="form-control" type="text" name="tenshop" value="{{ $shop->ten }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input class="form-control" type="email"name="email" value="{{ $user->email }}">
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="phone">Số điện thoại</label>
                            <input class="form-control" type="number" name="sdt" value="{{ $shop->sdt }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6 mb-3">
                        <div class="form-group">
                            <label for="address">Địa chỉ </label>
                            <input class="form-control" type="text" name="diachi" value="{{ $shop->diachi }}">
                        </div>
                    </div>

                </div>

                <div class="mt-3" style="display: flex;justify-content: center;">
                    <button class="btn btn-gray-800 mt-2 animate-up-2" type="submit">Cập nhật</button>
                </div>
                @csrf
            </div>

            </div>
        </form>
    </main>
    @include('admin.footer')
@endsection
