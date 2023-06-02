@extends('user.main')
@section('content')
    <section>
        <form action="" method="POST">
            <div class="row" style="margin: 80px ">

                <div class="card shadow border-0 text-center p-0 mt-3">
                    <div class="profile-cover rounded-top" style="background-color: #1F2937">
                    </div>
                    <div class="card-body pb-5">
                        <div id="hinhanh_show" class="avatar-xl rounded-circle mx-auto mt-n7 mb-4">
                            <img src="{{ $user->hinhanh }}" alt="{{ $user->hinhanh }}" style="border-radius: 50%">
                        </div>

                        <input type="file" id="hinhanh" class="form-control"
                            style="width: 90px;display: block; margin: 0 auto;" />
                        <h1>{{ $user->ten }}</h1>
                    </div>
                </div>


                <input type="hidden" name="hinhanh" value="{{ $user->hinhanh }}" id="hinhanh01">



                <div class="card card-body border-0 shadow mb-4 " style="margin-top: 20px;">
                    <h2 class="h5 mb-4">Thông tin chung</h2>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div>
                                <label for="first_name">Họ và Tên</label>
                                <input class="form-control" type="text" name="ten" value="{{ $user->ten }}">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input class="form-control" type="email"name="email" value="{{ $user->email }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="phone">Số điện thoại</label>
                                <input class="form-control" type="number" name="sdt" value="{{ $user->sdt }}">
                            </div>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <div class="form-group">
                                <label for="address">Địa chỉ </label>
                                <input class="form-control" type="text" name="diachi" value="{{ $user->diachi }}">
                            </div>
                        </div>



                    </div>

                </div>
                <div class="mt-3" style="display: flex;justify-content: center;">
                    <button class="btn btn-gray-800 mt-2 animate-up-2" type="submit">Cập nhật</button>
                </div>
                @csrf
        </form>
        </div>

        </div>
    </section>
    @include('admin.footer')
@endsection
