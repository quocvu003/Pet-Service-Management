<div class="row isotope-grid">
    @foreach ($dichvus as $key => $dichvu)
        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
            <!-- Block2 -->
            <div class="block2">
                <div class="block2-pic hov-img0">
                    <a href="/dich-vu/{{ $dichvu->id }}-{{ Str::slug($dichvu->ten, '-') }}.html"><img
                            src="{{ $dichvu->hinhanh }}" alt="{{ $dichvu->ten }} "></a>
                </div>

                <div class="block2-txt flex-w flex-t p-t-14">
                    <div class="block2-txt-child1 flex-col-l ">
                        <a href="/dich-vu/{{ $dichvu->id }}-{{ Str::slug($dichvu->ten, '-') }}.html"
                            class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                            {{ $dichvu->ten }}
                        </a>

                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
