@extends('user.main')
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
@section('content')
    <section>
        <div class="row" style="margin: 80px 200px 0 200px ">

            <div class="card card-body border-0 shadow mt-3">
                <form action="" method="POST">
                    <h3 style="margin: 30px 0;text-align: center">Đặt dịch vụ của {{ $shops->ten }}</h3>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="menu">Tên Shop</label>
                                <label name="tenshop" class="form-control">{{ $shops->ten }} </label>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <label name="diachi" class="form-control">{{ $shops->diachi }} </label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="menu">Tên người đặt lịch</label>
                                <input type="text" name="ten" value="{{ $user->ten }}" class="form-control"
                                    placeholder="Nhập tên">
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="menu">Email</label>
                                <input type="email" name="email" value="{{ $user->email }}" class="form-control"
                                    placeholder="Nhập email">
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="menu">Số điện thoại</label>
                                <input type="text" name="sdt" value="{{ $user->sdt }}" class="form-control"
                                    placeholder="Nhập số điện thoại">
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="menu">Ngày</label>
                                <input type="date" name="ngay" value="" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="menu">Giờ</label>
                                <input type="time" name="gio" value="" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="menu">Loại</label>
                                <select class="form-control" name="loaithucung">
                                    <option value="1">Chó</option>
                                    <option value="2">Mèo</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-6 mb-3">

                            <label for="services">Dịch vụ </label><br>
                            @foreach ($shops->dichvus as $dichvu)
                                <input type="checkbox" id={{ $dichvu->id }} name="dichvu[]" value={{ $dichvu->id }}
                                    {{ $dichvu->id == $dichvus->id ? 'checked' : '' }}
                                    onchange="handleCheckBox({{ $dichvu->gia }},event)">

                                <label for={{ $dichvu->id }}>{{ $dichvu->ten }} - Giá :
                                    {{ number_format($dichvu->gia) }}
                                    VNĐ </label><br>
                            @endforeach
                        </div>


                        <div class="col-md-3 mb-3">

                            <label for="menu">Tổng giá (VNĐ)</label>
                            <div class="form-group">
                                <input class="form-control" name='tongtien' id='tongtien' value={{ $dichvus->gia }}
                                    hidden>

                                <input class="form-control" name='tongtiensting' id='tongtiensting'
                                    value={{ number_format($dichvus->gia) }} disabled>
                            </div>
                        </div>
                    </div>

            </div>
        </div>


        <input type="hidden" name="shop_id" value="{{ $shops->id }}">
        <input type="hidden" name="taikhoan_id" value="{{ $user->id }}">

        <div class="card-footer d-flex justify-content-center">
            <button type="submit" class="btn btn-primary">Đặt lịch</button>
        </div>
        @csrf
        </form>

    </section>
@endsection
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
