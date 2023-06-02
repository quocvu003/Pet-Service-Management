@extends('ChuShop.main')
@section('content')
    <main class="content">
        @include('admin.alert')
        <div class="row">
            <div class="col-12 mb-4">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <div class="row d-block mt-4">

                            <div class="col-lg-12">


                                <div class="row">

                                    <div class="col-md-3">
                                        <button type="button" class="btn btn-block mb-3 "
                                            style="background-color:rgb(64, 70, 254);color: aliceblue"
                                            data-bs-toggle="modal" data-bs-target="#modal-form-request">Yêu cầu thêm dịch
                                            vụ</button>
                                    </div>

                                </div>



                                <!-- Modal yêu cầu thêm dịch vụ-->
                                <div class="modal fade" id="modal-form-request" tabindex="-1" role="dialog"
                                    aria-labelledby="modal-form-signup" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body p-0">
                                                <div class="card p-3 p-lg-4">
                                                    <button type="button" class="btn-close ms-auto" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                    <div class="text-center text-md-center mb-4 mt-md-0">
                                                        <h1 class="mb-0 h4">Yêu cầu thêm dịch vụ</h1>
                                                    </div>

                                                    <form action="" class="mt-4" method="POST"
                                                        enctype="multipart/form-data">
                                                        <!-- Form -->
                                                        <div class="form-group mb-4">
                                                            <label>Tên dịch vụ</label>
                                                            <div class="input-group">

                                                                <input type="text" class="form-control"
                                                                    value="{{ old('ten') }}"
                                                                    placeholder="Nhập tên dịch vụ" id="name"
                                                                    name="ten" autofocus>
                                                            </div>
                                                        </div>
                                                        <div class="form-group mb-4">
                                                            <label>Tiêu đề</label>
                                                            <div class="input-group">

                                                                <input type="text" class="form-control"
                                                                    value="{{ old('tieude') }}" placeholder="Nhập tiêu đề"
                                                                    id="tieude" name="tieude" autofocus>
                                                            </div>
                                                        </div>
                                                        <div class="form-group mb-4">
                                                            <label>Mô Tả</label>
                                                            <div class="input-group">

                                                                <textarea name="mota" class="form-control">{{ old('mota') }}"</textarea>
                                                            </div>
                                                        </div>
                                                        <p>Bạn không thể chỉnh sửa sau khi gửi yêu cầu!</p>
                                                        <div class="d-grid">
                                                            <button type="submit" class="btn"
                                                                style="background-color:rgb(64, 70, 254);color: aliceblue">GỬI
                                                                YÊU
                                                                CẦU</button>
                                                        </div>
                                                </div>

                                                @csrf

                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- End of Modal Content -->
                        </div>

                        <div style='overflow-x:scroll'>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="width: 50px">STT</th>
                                        <th>Tên Dịch Vụ</th>
                                        <th>Tiêu Đề</th>
                                        <th style="width: 550px">Mô Tả</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($danhmucs as $key => $danhmuc)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $danhmuc->ten }}</td>
                                            <td>{{ $danhmuc->tieude }}</td>
                                            <td>{{ $danhmuc->mota }}</td>


                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('admin.footer')
    </main>
@endsection
