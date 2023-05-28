@extends('admin.main')


@section('content')
    <form action="" method="POST">
        <div class="card-body ">

            <div>
                <span class="icon"><i class="fas fa-user-circle"></i></i></span>
                <label for="menu">Logo :
                    <a href="{{ $shops->hinhanh }}" target="_blank">
                        <img src="{{ $shops->hinhanh }}" width="150px">
                    </a>
                </label>


                <input type="hidden" name="hinhanh" value="{{ $shops->hinhanh }}" id="hinhanh01">
            </div>
            <div>
                <span class="icon"><i class="fas fa-user"></i></span>
                <label for="menu">Chủ sở hữu: {{ $acc->ten }}</label>
                <input type="hidden" name="ten" value="{{ $acc->ten }}">
            </div>
            <div>
                <span class="icon"><i class="fas fa-store"></i></span>
                <label for="menu">Ten shop : {{ $acc->shops->ten }}</label>
            </div>

            <div>
                <span class="icon"><i class="fas fa-envelope"></i></span>
                <label for="menu">Email : {{ $acc->email }}</label>
            </div>

            <div>
                <span class="icon"><i class="fas fa-phone"></i></span>
                <label for="menu">Số điện thoại : {{ $shops->sdt }}</label>
            </div>

            <div>
                <span class="icon"><i class="fas fa-map-marker-alt"></i></span>
                <label for="menu">Địa chỉ : {{ $shops->diachi }}</label>
            </div>
        </div>

        <input type="hidden" name="email" value="{{ $acc->email }}" id="email">
        </div>

        <div class="row" style="margin-left: 300px">


            {{-- <div class="col-3">
                <button type="submit" class="btn btn-primary btn-block">Duyệt đơn đăng ký</button>
            </div>
            <div class="col-3">
                <a href="/admin/accs/application">
                    <button type="button" class="btn btn-danger btn-block">Từ chối đơn đăng ký</button>
                </a>
            </div> --}}
            <div class="col-3">
                <button class="btn btn-primary btn-block" onclick="onSubmit(1,{{ $acc->id }})">Duyệt đơn đăng
                    ký</button>
            </div>
            <div class="col-3">
                <button class="btn btn-danger btn-block" style="margin-left: 50px"
                    onclick="onSubmit(0,{{ $acc->id }})">Từ chối
                    đơn đăng ký</button>

            </div>
        </div>

        @csrf
    </form>
@endsection
@section('footer')
@endsection
<script>
    function onSubmit(status, id) {
        console.log('vv ');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        const email = $("#email").val();

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',

            datatype: 'JSON',
            data: {

                status,
                email
            },
            url: `/admin/accs/showappli/${id}`,
            success: function(result) {
                console.log(result)

                window.location.href = '/admin/accs/application'
            },
            error: function(error) {
                console.log(error)

                window.location.reload()

            }
        })
    }
</script>
<style>
    .card-body div {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
        margin-left: 300px;
    }

    .card-body div span {
        margin-right: 10px;
        width: 30px;
        text-align: center;
    }

    .card-body div label {
        margin: 0;
    }

    .col-4 {
        text-align: right;
    }

    #hinhanh_show {
        display: flex;
        justify-content: center;
    }
</style>
