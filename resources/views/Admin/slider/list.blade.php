@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px">STT</th>
                <th>Tiêu Đề</th>
                <th>Link</th>
                <th>Ảnh</th>
                <th>Thứ tự Slide</th>
                <th>Trang Thái</th>
                <th>Ngày Tạo</th>
                <th style="width: 100px">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sliders as $key => $slider)
                @php
                    $stt = $key + 1;
                @endphp
                <tr>
                    <td>{{ $stt }}</td>
                    <td>{{ $slider->ten }}</td>
                    <td>{{ $slider->url }}</td>
                    <td><a href="{{ $slider->hinhanh }}" target="_blank">
                            <img src="{{ $slider->hinhanh }}" height="40px">
                        </a>
                    </td>
                    <td>{{ $slider->sapxep }}</td>
                    <td>{!! \App\Helpers\Helper::trangthai($slider->trangthai) !!}</td>
                    <td>{{ \Carbon\Carbon::parse($slider->created_at)->isoFormat('HH:mm DD/MM/YYYY') }}
                    <td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="/admin/sliders/edit/{{ $slider->id }}">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="#" class="btn btn-danger btn-sm"
                            onclick="removeRow({{ $slider->id }}, '/admin/sliders/destroy')">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {!! $sliders->links() !!}
@endsection
