@extends('user.main')

@section('content')
    <section class="bg-img1 txt-center p-lr-15 p-tb-92"
        style="background-image: url('/template/images/bg-01.jpg');margin-top: 200px;">
        <h2 class="ltext-105 cl0 txt-center" style="color: brown;margin-top: -150px;font-weight: bold">
            {{ $danhmucs->ten }}
        </h2>
    </section>


    <!-- Content page -->
    <section class="bg0 p-t-75 p-b-120">
        <div class="container">
            <div class="row row-small dnw-box-shadow row-box-shadow-1-hover" id="row-919874084">
                <div id="col-169626612" class="col small-12 large-12">
                    <div class="col-inner">
                        <div class="container section-title-container">
                            <h2 style="text-align: center;color: black; margin-bottom: 50px">3 ĐIỀU PET CARE CAM KẾT VỚI
                                KHÁCH HÀNG</h2>
                        </div>
                        <div class="row row-box-shadow-1 row-box-shadow-2-hover" id="row-973452678"
                            style="color: aliceblue;margin-bottom: 50px">
                            <div id="col-1513841456" class="col medium-4 small-12 large-4">
                                <div class="col-inner text-left dark"
                                    style="background-color:rgb(53, 132, 254); border-radius: 20px;">
                                    <h4 style="text-align: center;margin-bottom: 10px;color: aliceblue">HẾT MÌNH
                                        VÌ CÔNG VIỆC</h4>
                                    <p>Chúng tôi làm việc hết mình với chữ tâm, trách nhiệm và lòng nhiệt huyết. Thú
                                        cưng khỏe mạnh là niềm hạnh phúc của chúng tôi.</p>
                                </div>
                                <style>
                                    #col-1513841456>.col-inner {
                                        padding: 15px 15px 5px 15px;
                                    }
                                </style>
                            </div>
                            <div id="col-1885359868" class="col medium-4 small-12 large-4">
                                <div class="col-inner dark"
                                    style="background-color:rgb(53, 132, 254); border-radius: 20px;">
                                    <h4 style="text-align: center;margin-bottom: 10px;color: aliceblue">GIÁ DỊCH VỤ RẺ
                                        NHẤT</h4>
                                    <p>Chúng tôi cam kết đưa ra mức giá tốt nhất so với thị trường để tất cả thú
                                        cưng
                                        đều có cơ hội được trải nghiệm dịch vụ của chúng tôi.</p>
                                </div>
                                <style>
                                    #col-1885359868>.col-inner {
                                        padding: 15px 15px 5px 15px;
                                    }
                                </style>
                            </div>
                            <div id="col-1143621489" class="col medium-4 small-12 large-4">
                                <div class="col-inner dark"
                                    style="background-color:rgb(53, 132, 254); border-radius: 20px;">
                                    <h4 style="text-align: center;margin-bottom: 10px;color: aliceblue">CHẤT LƯỢNG HÀNG
                                        ĐẦU</h4>
                                    <p>Chúng tôi không ngừng nâng cao phát triển trình độ kỹ năng của nhân sự để
                                        phục vụ
                                        thú cưng những điều tốt đẹp nhất.</p>
                                </div>
                                <style>
                                    #col-1143621489>.col-inner {
                                        padding: 15px 15px 5px 15px;
                                    }
                                </style>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row p-b-50">
                <div class="col-md-7 col-lg-8">
                    <div class="p-t-7 p-r-85 p-r-15-lg p-r-0-md">
                        <b style="font-size: 20px">{{ $danhmucs->tieude }}</b>
                        <div style="white-space: pre-wrap;  line-height: 1.5;">
                            {{ $danhmucs->mota }}
                        </div>

                    </div>
                </div>

                <div class="col-11 col-md-5 col-lg-4 m-lr-auto">
                    <div class="how-bor1 ">
                        <div class="hov-img0">
                            <img src="{{ $danhmucs->hinhanh }}" alt="IMG">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="order-md-2 col-md-7 col-lg-8 p-b-30">
                    <div class="p-t-7 p-l-85 p-l-15-lg p-l-0-md">
                        <h3 class="mtext-111 cl2 p-b-16">
                            Những lưu ý khi sử dụng dịch vụ
                        </h3>
                        <p class="stext-113 cl6 ">
                            Pet Care không tiếp nhận vật nuôi có tiểu sử bệnh hen, co giật hoặc các bệnh về thần kinh.
                        </p>
                        <p class="stext-113 cl6 ">
                            Để đảm bảo an toàn cho sức khỏe khi đưa đến làm dịch vụ cắt tỉa lông chó mèo. Không cho thú
                            cưng ăn no và chạy nhảy quá sức trước khi đến cửa hàng. Có kế hoạch che nắng mưa trước khi
                            đến và sau khi về. Nếu thú cưng có những biểu hiện bất thường về sức khỏe xin vui lòng liên
                            hệ tới tổng đài của Pet Care để được trợ giúp.
                        </p>
                        <p class="stext-113 cl6 ">
                            Vui lòng kiểm tra kỹ thú cưng khi đến đón thú cưng sau khi làm dịch vụ. Quy trình đảm bảo
                            nhân viên của Pet Care đã thực hiện đúng yêu cầu và bạn hài lòng với chất lượng dịch vụ.
                        </p>


                    </div>
                </div>

                <div class="order-md-1 col-11 col-md-5 col-lg-4 m-lr-auto p-b-30">
                    <div class="how-bor2">
                        <div class="hov-img0">
                            <img src="/template/images/trongthucung.jpg" alt="IMG">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>

            <div style="width: 90%;margin: 0 auto;
            text-align: center; ">
                <div class="row dnw-box-shadow" id="row-1942645051">
                    <div id="col-1304916579" class="col small-12 large-12">
                        <div class="col-inner">
                            <h2>Các Shop có dịch vụ {{ $danhmucs->ten }}</h2>
                        </div>
                        <p>Bảng giá các dịch vụ sẽ tùy thuộc vào từng Shop khác nhau. Vui lòng đọc kỹ giá!</p>
                    </div>
                </div>
            </div>

            <div class="sec-banner bg0 p-t-80 p-b-50">
                <div class="container">
                    <div class="row">
                        @php
                            $so = 0;
                        @endphp
                        @foreach ($dichvus as $dichvu)
                            @php
                                $so++;
                            @endphp
                            <div class="col-md-3 col-xl-6 p-b-30 m-lr-auto">
                                <!-- Block1 -->
                                <div class="block1 wrap-pic-w">

                                    <img src="/template/images/shop{{ $so }}.jpg" alt="IMG-BANNER" height="300px">


                                    <a href="/datlich/{{ $dichvu->shops->id }}-{{ $dichvu->id }}"
                                        class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                                        <div class="block1-txt-child1 flex-col-l">
                                            <span class="block1-name ltext-102 trans-04 p-b-8" style="font-weight: bold">
                                                Tên Shop : {{ $dichvu->shops->ten }}
                                            </span>

                                            <span class="block1-info stext-102 trans-04" style="font-weight: 600">
                                                Tên dịch vụ : {{ $dichvu->ten }}
                                            </span>
                                            <span class="block1-info stext-102 trans-04" style="font-weight: 600">
                                                Giá : {{ number_format($dichvu->gia) }} VNĐ
                                            </span>
                                        </div>

                                        <div class="block1-txt-child2 p-b-4 trans-05">
                                            <div class="block1-link stext-101 cl0 trans-09">
                                                Đặt lịch ngay
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>


    </section>
@endsection
