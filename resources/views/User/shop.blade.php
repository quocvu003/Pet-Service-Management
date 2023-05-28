@extends('user.main')
@section('content')

    <body>
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
                        style=" margin-bottom: 50px;border-radius:10px ;border: 1px solid rgb(129, 128, 128);">
                        <div class="col-md-2" style="margin-top: 30px">
                            <img src="{{ $shop->hinhanh }}" alt="ảnh shop" width="150" height="150">
                            </a>
                        </div>
                        <div class="col-md-3">
                            <h4 style="margin-top: 10px">Thông tin của Shop</h4>
                            <ul>
                                <li style="margin : 10px 0"><b>Tên Shop :</b> {{ $shop->ten }}</li>

                                @foreach ($shop->users as $user)
                                    @if ($user->quyen_id == 2)
                                        <li style="margin : 10px 0"><b>Chủ sở hữu :</b> {{ $user->ten }}</li>
                                        <li style="margin : 10px 0"><b>Email:</b> {{ $user->email }}</li>
                                    @endif
                                @endforeach

                                <li style="margin : 10px 0"><b>Số điện thoại :</b> {{ $shop->sdt }}</li>
                                <li style="margin : 10px 0"><b>Địa chỉ :</b> {{ $shop->diachi }}</li>
                            </ul>

                        </div>
                        <div class="col-md-7">
                            <h4 style="margin-top: 10px">Dịch vụ của Shop</h4>
                            <ul>
                                @foreach ($shop->dichvus as $dichvu)
                                    <div style="display: flex; align-items: center; gap: 20px">
                                        <li style="margin : 10px 0; width: 320px;">{{ $dichvu->ten }} </li> -
                                        <a href="/dichvu/{{ $dichvu->danhmucs->id }}"
                                            style="font-weight: 600; color: #13b82c">Xem chi
                                            tiết</a> -
                                        <a href="/datlich/{{ $dichvu->shops->id }}-{{ $dichvu->id }}"
                                            style="font-weight: 600; color: #4431db"> Đặt dịch vụ</a>
                                    </div>
                                @endforeach

                            </ul>

                        </div>


                    </div>
                @endforeach

            </div>
            <div
                style="display: flex;align-items: center; justify-content: center !important; align-items: center !important">
                {{ $shops->links() }}
            </div>
        </section>
    </body>
@endsection
