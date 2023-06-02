<?php


namespace App\Helpers;

use Illuminate\Support\Str;

class Helper
{
    public static function danhmuc($danhmucs)
    {
        $html = '';

        foreach ($danhmucs as $key => $danhmuc) {

            $html .= '
            <tr>
                <td>'  . ++$key . '</td>
                <td>'  . $danhmuc->ten . '</td>                       
                <td>'  . $danhmuc->tieude . '</td>
                <td>
                    <a href="' . $danhmuc->hinhanh . '" target="_blank">
                        <img src="' . $danhmuc->hinhanh . '" height="50px">
                    </a>
                </td>
                <td>' . self::trangthai($danhmuc->trangthai) . '</td>
                <td>' . \Carbon\Carbon::parse($danhmuc->created_at)->isoFormat('HH:mm:ss DD/MM/YYYY') . '</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="/admin/danhmucs/edit/' . $danhmuc->id . '">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="#" class="btn btn-danger btn-sm"
                        onclick="removeRow(' . $danhmuc->id . ', \'/admin/danhmucs/destroy\')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
        ';
        }

        return $html;
    }

    public static function trangthai($trangthai = 0): string
    {
        return $trangthai == 0 ? '<span class="btn btn-danger btn-xs">KHÓA</span>'
            : ($trangthai == 1 ? '<span class="btn btn-success btn-xs">KÍCH HOẠT </span>'
                : '<span class="btn btn-warning btn-xs">CHỜ DUYỆT</span>');
    }

    public static function trangthai_lichdat($trangthai = 0): string
    {
        return $trangthai == 1 ? '<span class="btn btn-danger btn-xs">CHỜ DUYỆT</span>'
            : ($trangthai == 2 ? '<span class="btn btn-info btn-xs">ĐÃ DUYỆT</span>'
                : ($trangthai == 3 ? '<span class="btn btn-success btn-xs">HOÀN THÀNH</span>'
                    : '<span class="btn btn-primary btn-xs">TỪ CHỐI</span>'));
    }

    public static function danhmucs($danhmucs): string
    {
        $html = '<ul>';

        foreach ($danhmucs as $danhmuc) {

            $html .= '<li>
            <a href="/danh-muc/' . $danhmuc->id . '-' . '.html">' . $danhmuc->ten . '</a>
            </li>';
        }
        $html .= '</ul>';
        return $html;
    }
}
