<footer class="bg3 p-t-75 p-b-32">
    <div class="container">
        <div class="row align-middle align-center hide-for-medium" id="row-187515201">
            <div id="col-409485728" class="col medium-2 small-12 large-2">
                <div class="col-inner text-center">
                </div>
            </div>
            <div id="col-1013548930" class="col medium-2 small-12 large-2">
                <div class="col-inner text-center">
                    <p><a title="DMCA Compliance information for www.petmart.vn"
                            href="https://s.petmart.vn/3pOUXmq"><img
                                src="https://www.petmart.vn/wp-content/uploads/2019/10/dmca-compliant.png"
                                alt="DMCA Compliance Statement" width="" height=""></a></p>
                </div>
            </div>
            <div id="col-731119853" class="col medium-2 small-12 large-2">
                <div class="col-inner text-center">
                    <p><a class="dmca-badge" title="DMCA.com Protection Status"
                            href="https://www.dmca.com/Protection/Status.aspx?ID=785ceaee-9d79-4b8a-9ab1-a09991c670a3&amp;refurl=https://www.petmart.vn/thuong-hieu"><img
                                src="https://www.petmart.vn/wp-content/uploads/2019/10/dmca-protecte.png?ID=785ceaee-9d79-4b8a-9ab1-a09991c670a3"
                                alt="DMCA.com Protection Status" width="" height=""></a>
                        <script src="https://images.dmca.com/Badges/DMCABadgeHelper.min.js" type="text/javascript"></script>
                    </p>
                </div>
            </div>
            <div id="col-1474850719" class="col medium-2 small-12 large-2">
                <div class="col-inner text-center">
                    <p><a title="Website đã thông báo với Bộ Công Thương" href="https://s.petmart.vn/35jRpRn"
                            rel="nofollow"><img
                                src="https://www.petmart.vn/wp-content/uploads/2017/01/bo-cong-thuong.png"
                                alt="Website đã thông báo với Bộ công thương" width="160" height=""></a></p>
                </div>
            </div>
            <div id="col-1458449435" class="col medium-2 small-12 large-2">
                <div class="col-inner text-center">
                    <p><a title="Pet Mart Domestic TradeMark - Bản quyền nhãn hiệu" href="http://s.petmart.vn/3pVSCWL"
                            rel="nofollow"><img src="https://www.petmart.vn/wp-content/uploads/2020/09/VNCLC.png"
                                alt="Website đã thông báo với Bộ công thương" width="70" height="55"></a></p>
                </div>
            </div>
            <div id="col-360156173" class="col medium-2 small-12 large-2">
                <div class="col-inner text-center">
                </div>
            </div>
        </div>
    </div>

    <!--===============================================================================================-->
    <script src="/template/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="/template/vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="/template/vendor/bootstrap/js/popper.js"></script>
    <script src="/template/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="/template/vendor/select2/select2.min.js"></script>
    <script>
        $(".js-select2").each(function() {
            $(this).select2({
                minimumResultsForSearch: 20,
                dropdownParent: $(this).next('.dropDownSelect2')
            });
        })
    </script>
    <!--===============================================================================================-->
    <script src="/template/vendor/daterangepicker/moment.min.js"></script>
    <script src="/template/vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="/template/vendor/slick/slick.min.js"></script>
    <script src="/template/js/slick-custom.js"></script>
    <!--===============================================================================================-->
    <script src="/template/vendor/parallax100/parallax100.js"></script>
    <script>
        $('.parallax100').parallax100();
    </script>
    <!--===============================================================================================-->
    <script src="/template/vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
    <script>
        $('.gallery-lb').each(function() { // the containers for all your galleries
            $(this).magnificPopup({
                delegate: 'a', // the selector for gallery item
                type: 'image',
                gallery: {
                    enabled: true
                },
                mainClass: 'mfp-fade'
            });
        });
    </script>
    <!--===============================================================================================-->
    <script src="/template/vendor/isotope/isotope.pkgd.min.js"></script>
    <!--===============================================================================================-->
    <script src="/template/vendor/sweetalert/sweetalert.min.js"></script>
    <script>
        $('.js-addwish-b2').on('click', function(e) {
            e.preventDefault();
        });

        $('.js-addwish-b2').each(function() {
            var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
            $(this).on('click', function() {
                swal(nameProduct, "is added to wishlist !", "success");

                $(this).addClass('js-addedwish-b2');
                $(this).off('click');
            });
        });

        $('.js-addwish-detail').each(function() {
            var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

            $(this).on('click', function() {
                swal(nameProduct, "is added to wishlist !", "success");

                $(this).addClass('js-addedwish-detail');
                $(this).off('click');
            });
        });

        /*---------------------------------------------*/

        $('.js-addcart-detail').each(function() {
            var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
            $(this).on('click', function() {
                swal(nameProduct, "is added to cart !", "success");
            });
        });
    </script>
    <!--===============================================================================================-->
    <script src="/template/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script>
        $('.js-pscroll').each(function() {
            $(this).css('position', 'relative');
            $(this).css('overflow', 'hidden');
            var ps = new PerfectScrollbar(this, {
                wheelSpeed: 1,
                scrollingThreshold: 1000,
                wheelPropagation: false,
            });

            $(window).on('resize', function() {
                ps.update();
            })
        });
    </script>
    <!--===============================================================================================-->
    <script src="/template/js/main.js"></script>
    <script src="/template/js/public.js"></script>
    <script src="/template/admin/js/main.js"></script>
