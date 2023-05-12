@extends('user.main')
@section('content')
    <section class="bg-img1 txt-center p-lr-15 p-tb-92"
        style="background-image: url('/template/images/bg-01.jpg');margin-top: 200px;">
        <h2 class="ltext-105 cl0 txt-center" style="color: brown;margin-top: -150px">
            Các Shop thú cưng của chúng tôi
        </h2>
    </section>
    <section class="bg0 p-t-100 p-b-120">
        <div class="container">
            @foreach ($shops as $shop)
                <div class="row"
                    style="display: flex;border: 1px solid rgb(129, 128, 128); margin-bottom: 50px;border-radius:10px ">
                    <div class="col-md-3">
                        <img src="{{ $shop->hinhanh }}" alt="ảnh shop" width="200" height="200">
                        </a>
                    </div>
                    <div class="col-md-4" style="margin-left: -50px">
                        <h4 style="margin-top: 10px">Thông tin của Shop</h4>
                        <ul>
                            <li style="margin : 10px 0">Tên Shop : {{ $shop->ten }}</li>
                            <li style="margin : 10px 0">Số điện thoại : {{ $shop->sdt }}</li>
                            <li style="margin : 10px 0">Địa chỉ : {{ $shop->diachi }}</li>
                        </ul>

                    </div>
                    <div class="col-md-4">
                        <h4 style="margin-top: 10px">Dịch vụ của Shop</h4>
                        <ul>
                            @foreach ($shop->dichvus as $dichvu)
                                <li style="margin : 10px 0">{{ $dichvu->ten }}</li>
                            @endforeach
                        </ul>

                    </div>


                </div>
            @endforeach
        </div>
    </section>
@endsection
