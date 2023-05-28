<!DOCTYPE html>
<html>

<body>
    <h1>Đặt dịch vụ thành công</h1>
    <p>Cảm ơn bạn đã đặt dịch vụ tại trang web của chúng tôi.</p>
    <p>Thông tin đặt dịch vụ:</p>
    <ul>
        <li><strong>Tên Shop:</strong> {{ $lichdatdv->shops->ten }}</li>
        <li><strong>Địa chỉ:</strong> {{ $lichdatdv->shops->diachi }}</li>
        <li><strong>Tên người đặt lịch:</strong> {{ $lichdatdv->ten }}</li>
        <li><strong>Ngày:</strong> {{ $lichdatdv->ngay }}</li>
        <li><strong>Giờ:</strong> {{ $lichdatdv->gio }}</li>
        <li><strong>Tổng tiền:</strong> {{ number_format($lichdatdv->tongtien) }} VNĐ</li>
    </ul>
    <p>Vui lòng đến đúng giờ để chúng tôi có thể phục vụ bạn và thú cưng một cách trọn vẹn!</p>
    <p>Trân trọng</p>
</body>

</html>
