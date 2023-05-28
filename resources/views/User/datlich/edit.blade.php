@extends('user.main')

@section('content')
    <section style="margin-bottom: 50px">
        <div class="row" style="margin: 80px 100px 0 100px ">

            <div class="card card-body border-0 shadow mt-3 mb-5">
                <form action="" method="POST">
                    <div class="card-body">
                        <h2 style="margin-left: 400px;margin-bottom: 50px">Chi tiết lịch đặt dịch vụ</h2>

                        <div class="row">
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
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label for="menu">Tên người đặt lịch</label>
                                    <input type="text" name="ten" value="{{ $lichdats->ten }}" class="form-control"
                                        placeholder="Nhập tên">

                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label for="menu">Email</label>
                                    <input type="email" name="email" value="{{ $lichdats->email }}" class="form-control"
                                        placeholder="Nhập email">

                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label for="menu">Số điện thoại</label>

                                    <input type="text" name="sdt" value="{{ $lichdats->sdt }}" class="form-control"
                                        placeholder="Nhập số điện thoại">
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label for="menu">Ngày</label>
                                    <input type="date" name="ngay" value="{{ $lichdats->ngay }}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label for="menu">Giờ</label>

                                    <input type="time" name="gio" value="{{ $lichdats->gio }}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">

                                <label for="menu">Loại</label>

                                <select class="form-control" name="loaithucung">
                                    <option value="1" {{ $lichdats->loaithucung == 1 ? 'selected' : '' }}>Chó
                                    </option>
                                    <option value="2" {{ $lichdats->loaithucung == 2 ? 'selected' : '' }}>Mèo</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-8 mb-3">

                                <label>Dịch vụ </label><br>
                                @foreach ($shops as $shop)
                                    @foreach ($shop->dichvus as $dichvu)
                                        <input type="checkbox" id={{ $dichvu->id }} name="dichvu[]"
                                            value={{ $dichvu->id }}
                                            {{ in_array($dichvu->id, $arr_id) ? 'checked' : '' }}
                                            onchange="handleCheckBox({{ $dichvu->gia }},event)">

                                        <label for={{ $dichvu->id }}>{{ $dichvu->ten }} - Giá :
                                            {{ number_format($dichvu->gia) }}
                                            VNĐ </label><br>
                                    @endforeach
                                @endforeach

                            </div>
                            <div class="col-md-4 mb-3">
                                <input class="form-control" name='tongtien' id='tongtien' value={{ $lichdats->tongtien }}
                                    hidden>

                                <label for="menu">Tổng giá (VNĐ)</label>
                                <input class="form-control" name='tongtiensting' id='tongtiensting'
                                    value={{ number_format($lichdats->tongtien) }} disabled>

                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">Cập nhật</button>

                        </div>
                    </div>

            </div>
        </div>


        @csrf
        </form>

    </section>
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
