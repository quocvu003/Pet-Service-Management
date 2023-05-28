@extends('user.main')
@section('content')
    <!-- Slider -->
    <section class="section-slide">
        <div class="wrap-slick1">
            <div class="slick1">
                @include('admin.alert')
                @foreach ($sliders as $slider)
                    <div class="item-slick1" style="background-image: url({{ $slider->hinhanh }});">
                        <div class="container h-full">
                            <div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
                                <div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
                                    <span class="ltext-101 cl2 respon2">
                                        HOT 2023
                                    </span>
                                </div>

                                <div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
                                    <h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
                                        {{ $slider->ten }}
                                    </h2>
                                </div>

                                <div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
                                    <a href="{{ $slider->url }}"
                                        class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                                        Tìm hiểu thêm
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <h1 style="margin-top: 100px; text-align: center">Các dịch vụ chăm sóc thú cưng của chúng tôi</h1>

    <!-- Banner -->
    <div class="sec-banner bg0 p-t-80 p-b-50">
        <div class="container">
            <div class="row">
                @php
                    $so = 0;
                @endphp
                @foreach ($menus as $menu)
                    @php
                        $so++;
                    @endphp
                    <div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
                        <!-- Block1 -->
                        <div class="block1 wrap-pic-w">
                            <img src="/template/images/danhmuc{{ $so }}.jpg" alt="IMG-BANNER" height="300px">

                            <a href="dichvu/{{ $menu->id }}"
                                class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                                <div class="block1-txt-child1 flex-col-l">
                                    <span class="block1-name ltext-102 trans-04 p-b-8" style="font-weight: bold">
                                        {{ $menu->ten }}
                                    </span>

                                    <span class="block1-info stext-102 trans-04">
                                        HOT 2023
                                    </span>
                                </div>

                                <div class="block1-txt-child2 p-b-4 trans-05">
                                    <div class="block1-link stext-101 cl0 trans-09">
                                        Tìm hiểu thêm
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
