<?php


namespace App\Helpers;

use Illuminate\Support\Str;

class Helper
{
    public static function danhmuc($danhmucs, $danhmuccha = 0, $char = '')
    {
        $html = '';

        foreach ($danhmucs as $key => $danhmuc) {
            if ($danhmuc->danhmuccha == $danhmuccha) {
                $html .= '
                    <tr>
                        <td>' . $danhmuc->id . '</td>
                        <td>' . $char . $danhmuc->ten . '</td>
                        <td>' . self::trangthai($danhmuc->trangthai) . '</td>
                       
                        <td>' . \Carbon\Carbon::parse($danhmuc->created_at)->isoFormat('DD/MM/YYYY') . '</td>
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

                unset($danhmucs[$key]);

                $html .= self::danhmuc($danhmucs, $danhmuc->id, $char . '|--');
            }
        }

        return $html;
    }

    public static function trangthai($trangthai = 0): string
    {
        return $trangthai == 0 ? '<span class="btn btn-danger btn-xs">KHÓA</span>'
            : ($trangthai == 2 ? '<span class="btn btn-warning btn-xs">CHỜ DUYỆT</span>'
                : '<span class="btn btn-success btn-xs">KÍCH HOẠT</span>');
    }

    public static function danhmucs($danhmucs, $danhmuccha = 0): string
    {
        $html = '';
        foreach ($danhmucs as $key => $danhmuc) {
            if ($danhmuc->danhmuccha == $danhmuccha) {
                $html .= '
                    <li>
                        <a href="/danh-muc/' . $danhmuc->id . '-' . Str::slug($danhmuc->ten, '-') . '.html">
                            ' . $danhmuc->ten . '
                        </a>';

                unset($danhmucs[$key]);

                if (self::isChild($danhmucs, $danhmuc->id)) {
                    $html .= '<ul class="sub-menu">';
                    $html .= self::danhmucs($danhmucs, $danhmuc->id);
                    $html .= '</ul>';
                }

                $html .= '</li>';
            }
        }

        return $html;
    }

    public static function isChild($danhmucs, $id): bool
    {
        foreach ($danhmucs as $danhmuc) {
            if ($danhmuc->danhmuccha == $id) {
                return true;
            }
        }
        return false;
    }
}
