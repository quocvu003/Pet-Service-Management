@extends('admin.main')
@section('content')
    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px">STT</th>
                <th>Ten</th>
                <th>Tiêu đề</th>
                <th>Hình ảnh</th>
                <th>Trạng thái</th>

                <th>Ngày tạo</th>
                <th style="width: 100px">&nbsp;</th>
            </tr>
        </thead>

        <tbody>
            {!! \App\Helpers\Helper::danhmuc($danhmucs) !!}
        </tbody>

    </table>
@endsection
