@extends('nhanvien.main')

@section('content')
    <form action="" method="POST">
        <main class="content">
            @include('admin.alert')
            <div class="row" style="margin: 0 50px">

                <div class="card card-body border-0 shadow mt-3 mb-5">
                    <h2 style="margin-left: 50px;margin-bottom: 50px">Chi tiết lịch đặt dịch vụ của khách hàng:
                        {{ $lichdats->ten }}</h2>

                    {{-- <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="menu">Tên Shop</label>
                                    <label class="form-control"> {{ $lichdats->shops->ten }} </label>
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label>Địa chỉ</label>
                                    <label class="form-control">{{ $lichdats->shops->diachi }} </label>
                                </div>
                            </div>
                        </div> --}}

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="menu">Tên người đặt lịch</label>
                                <label class="form-control">{{ $lichdats->ten }}</label>

                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="menu">Email</label>
                                <label class="form-control">{{ $lichdats->email }}</label>

                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="menu">Số điện thoại</label>

                                <label class="form-control">{{ $lichdats->sdt }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="menu">Ngày</label>
                                <label class="form-control">{{ $lichdats->ngay }}</label>

                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="menu">Giờ</label>

                                <label class="form-control">{{ $lichdats->gio }}</label>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">

                            <label>Loại</label>

                            <label class="form-control">
                                @if ($lichdats->loaithucung == 1)
                                    Chó
                                @elseif($lichdats->loaithucung == 2)
                                    Mèo
                                @endif
                            </label>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-8 mb-3">

                            <label>Dịch vụ</label><br>
                            @foreach ($shops as $shop)
                                @foreach ($dichvu_dichvudats as $key => $dichvu_dichvudat)
                                    <ul>
                                        <li>{{ ++$key }}. {{ $dichvu_dichvudat->dichvus->ten }}</li>
                                    </ul>
                                @endforeach
                            @endforeach

                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="menu">Tổng giá (VNĐ)</label>
                            <div class="form-group">
                                <input class="form-control" name='tongtien' id='tongtien' value={{ $lichdats->tongtien }}
                                    hidden>

                                <input class="form-control" name='tongtiensting' id='tongtiensting'
                                    value={{ number_format($lichdats->tongtien) }} disabled>

                            </div>

                        </div>
                    </div>
                    {{-- <div class="card-footer d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Hoàn Thành</button>

                    </div> --}}
                </div>

            </div>
            <input type="hidden" name="trangthai" value="3">
        </main>
        @csrf
    </form>
@endsection
<style>
    input[type="checkbox"] {
        display: inline-block;
        width: auto;
        margin-right: 10px;
    }

    label {
        display: inline-block;
        margin-bottom: 10px;
    }
</style>
<script>
    function handleCheckBox(gia, event) {
        console.log(event.target.checked);
        let tien = Number($('#tongtien').val())
        if (event.target.checked) {
            tien = tien + gia
        } else {
            tien = tien - gia

        }
        let tienFormat = tien.toLocaleString('it-IT', {
            style: 'currency',
            currency: 'VND'
        })
        $('#tongtien').val(tien)
        $('#tongtiensting').val(tienFormat)

        console.log(tien.toLocaleString('it-IT', {
            style: 'currency',
            currency: 'VND'
        }));
    }

    function formatVND(tien) {

        let tienFormat = tien.toLocaleString('it-IT', {
            style: 'currency',
            currency: 'VND'
        })
        return tienFormat

    }
</script>
<script src="/template/vendor/jquery/jquery-3.2.1.min.js"></script>
