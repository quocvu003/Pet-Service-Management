@extends('admin.main')
@section('content')
    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px">STT</th>
                <th>Ten</th>
                <th>Tiêu đề</th>
                <th>Mô tả</th>
                <th>Trạng thái</th>
                <th>Ngày tạo</th>
                <th style="width: 100px">&nbsp;</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($danhmucs as $key => $danhmuc)
                @php
                    $stt = $key + 1;
                @endphp
                <tr>
                    <td>{{ $stt }}</td>
                    <td>{{ $danhmuc->ten }}</td>
                    <td>{{ $danhmuc->tieude }}</td>
                    <td style="max-width: 200px;">{{ $danhmuc->mota }}</td>


                    <td>{!! \App\Helpers\Helper::trangthai($danhmuc->trangthai) !!}</td>
                    <td>{{ \Carbon\Carbon::parse($danhmuc->created_at)->isoFormat('DD/MM/YYYY HH:mm:ss') }}
                    <td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="/admin/danhmucs/edit_requestdv/{{ $danhmuc->id }}">
                            <i class="fas fa-edit"></i>
                        </a>
                        {{-- <a href="#" class="btn btn-danger btn-sm"
                            onclick="removeRow({{ $slider->id }}, '/admin/sliders/destroy')">
                            <i class="fas fa-trash"></i>
                        </a> --}}
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>
@endsection
