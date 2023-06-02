@extends('admin.main')
@section('content')
    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px">STT</th>
                <th>Ảnh đại diện</th>
                <th>Tên shop</th>
                <th>Chủ sở hữu</th>
                <th>Tiền</th>
                <th>Trạng thái</th>
                <th>Năm</th>

                <th>Cập nhật</th>

            </tr>
        </thead>
        <tbody>

            @foreach ($shops as $key => $shop)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td><a href="{{ $shop->hinhanh }}" target="_blank">
                            <img src="{{ $shop->hinhanh }}" height="40px">
                        </a>
                    </td>
                    <td>{{ $shop->ten }}</td>
                    @foreach ($shop->users as $user)
                        @if ($user->quyen_id == 2)
                            <td>{{ $user->ten }}</td>
                        @endif
                    @endforeach
                    <td>
                        @foreach ($shop->phithus as $phithu)
                            {{ number_format($phithu->tien) }} VNĐ
                        @endforeach
                    </td>
                    <td>
                        @if ($shop->phithus->count() > 0)
                            @foreach ($shop->phithus as $phithu)
                                @php
                                    if ($phithu->tien == 100000000 && \Carbon\Carbon::now()->format('Y') == \Carbon\Carbon::parse($phithu->updated_at)->format('Y')) {
                                        echo '<span style="background-color: green; color: aliceblue;border-radius: 10px; padding: 5px;">Đã Nộp Đủ</span>';
                                    } else {
                                        $missingAmount = 100000000 - $phithu->tien;
                                        echo 'Thiếu ' . number_format($missingAmount) . ' VNĐ</span>';
                                    }
                                @endphp
                            @endforeach
                        @else
                            <span style="background-color:brown ;color:aliceblue;border-radius: 10px; padding: 5px">Chưa
                                Nộp</span>
                        @endif
                    </td>



                    <td>{{ date('Y') }}</td>
                    <td>
                        @foreach ($shop->phithus as $phithu)
                            {{ \Carbon\Carbon::parse($phithu->updated_at)->isoFormat('HH:mm:ss DD/MM/YYYY') }}
                        @endforeach
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div style="display: flex;justify-content: center;align-content: center"> {{ $shops->links() }}</div>
@endsection
