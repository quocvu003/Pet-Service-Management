<!DOCTYPE html>
<html lang="en">

<head>
    @include('user.head')
    <!--===============================================================================================-->
</head>

<body class="animsition">

    <!-- Header -->
    @include('user.nav')

    <!-- Cart -->
    <div class="wrap-header-cart js-panel-cart">
        <div class="s-full js-hide-cart"></div>

        <div class="header-cart flex-col-l p-l-65 p-r-25">
            <div class="header-cart-title flex-w flex-sb-m p-b-8">
                <span class="mtext-103 cl2">
                    Your Cart
                </span>

                <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
                    <i class="zmdi zmdi-close"></i>
                </div>
            </div>

            <div class="header-cart-content flex-w js-pscroll">
                <ul class="header-cart-wrapitem w-full">
                    <li class="header-cart-item flex-w flex-t m-b-12">
                        <div class="header-cart-item-img">
                            <img src="images/item-cart-01.jpg" alt="IMG">
                        </div>

                        <div class="header-cart-item-txt p-t-8">
                            <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                                White Shirt Pleat
                            </a>

                            <span class="header-cart-item-info">
                                1 x $19.00
                            </span>
                        </div>
                    </li>

                    <li class="header-cart-item flex-w flex-t m-b-12">
                        <div class="header-cart-item-img">
                            <img src="images/item-cart-02.jpg" alt="IMG">
                        </div>

                        <div class="header-cart-item-txt p-t-8">
                            <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                                Converse All Star
                            </a>

                            <span class="header-cart-item-info">
                                1 x $39.00
                            </span>
                        </div>
                    </li>

                    <li class="header-cart-item flex-w flex-t m-b-12">
                        <div class="header-cart-item-img">
                            <img src="images/item-cart-03.jpg" alt="IMG">
                        </div>

                        <div class="header-cart-item-txt p-t-8">
                            <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                                Nixon Porter Leather
                            </a>

                            <span class="header-cart-item-info">
                                1 x $17.00
                            </span>
                        </div>
                    </li>
                </ul>

                <div class="w-full">
                    <div class="header-cart-total w-full p-tb-40">
                        Total: $75.00
                    </div>

                    <div class="header-cart-buttons flex-w w-full">
                        <a href="shoping-cart.html"
                            class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
                            View Cart
                        </a>

                        <a href="shoping-cart.html"
                            class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
                            Check Out
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Title page -->
    <section class="bg-img1 txt-center p-lr-15 p-tb-92"
        style="background-image: url('/template/images/bg-01.jpg');margin-top: 110px">
        <h2 class="ltext-105 cl0 txt-center" style="color: brown">
            About
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
                                <div class="col-inner text-left dark" style="background-color:rgb(53, 132, 254);">
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
                                <div class="col-inner dark" style="background-color:rgb(53, 132, 254);">
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
                                <div class="col-inner dark" style="background-color:rgb(53, 132, 254);">
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



            <div class="row p-b-148">
                <div class="col-md-7 col-lg-8">
                    <div class="p-t-7 p-r-85 p-r-15-lg p-r-0-md">
                        <h3 class="mtext-111 cl2 p-b-16">
                            Những lưu ý khi sử dụng dịch vụ
                        </h3>

                        <p class="stext-113 cl6 p-b-26">
                            Pet Care không tiếp nhận vật nuôi có tiểu sử bệnh hen, co giật hoặc các bệnh về thần kinh.
                        </p>

                        <p class="stext-113 cl6 p-b-26">
                            Để đảm bảo an toàn cho sức khỏe khi đưa đến làm dịch vụ cắt tỉa lông chó mèo. Không cho thú
                            cưng ăn no và chạy nhảy quá sức trước khi đến cửa hàng. Có kế hoạch che nắng mưa trước khi
                            đến và sau khi về. Nếu thú cưng có những biểu hiện bất thường về sức khỏe xin vui lòng liên
                            hệ tới tổng đài của Pet Care để được trợ giúp.
                        </p>

                        <p class="stext-113 cl6 p-b-26">
                            Vui lòng kiểm tra kỹ thú cưng khi đến đón thú cưng sau khi làm dịch vụ. Quy trình đảm bảo
                            nhân viên của Pet Care đã thực hiện đúng yêu cầu và bạn hài lòng với chất lượng dịch vụ.
                        </p>
                    </div>
                </div>

                <div class="col-11 col-md-5 col-lg-4 m-lr-auto">
                    <div class="how-bor1 ">
                        <div class="hov-img0">
                            <img src="/template/images/tialong.jpg" alt="IMG">
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
                        <p class="stext-113 cl6 p-b-26">
                            Pet Care không tiếp nhận vật nuôi có tiểu sử bệnh hen, co giật hoặc các bệnh về thần kinh.
                        </p>
                        <p class="stext-113 cl6 p-b-26">
                            Để đảm bảo an toàn cho sức khỏe khi đưa đến làm dịch vụ cắt tỉa lông chó mèo. Không cho thú
                            cưng ăn no và chạy nhảy quá sức trước khi đến cửa hàng. Có kế hoạch che nắng mưa trước khi
                            đến và sau khi về. Nếu thú cưng có những biểu hiện bất thường về sức khỏe xin vui lòng liên
                            hệ tới tổng đài của Pet Care để được trợ giúp.
                        </p>
                        <p class="stext-113 cl6 p-b-26">
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
    </section>



    <!-- Footer -->
    @include('user.footer')

</body>

</html>
