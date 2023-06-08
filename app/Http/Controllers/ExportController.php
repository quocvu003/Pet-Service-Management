<?php

namespace App\Http\Controllers;

use App\Http\Services\DichVuDatService;
use App\Models\DichVu_DichVuDat;
use App\Models\DichVuDat;
use App\Models\Shop;
use App\Models\User;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\Auth;

class ExportController extends Controller
{
    protected $dicvudatService;

    public function __construct(DichVuDatService $dicvudatService)
    {
        $this->dicvudatService = $dicvudatService;
    }
    public function exportPDF()
    {
        $lichdatdvstemp = [];
        $dichvudats = [];
        $id_shop = null;

        $user = Auth::user();

        $shop = Shop::where('id', $user->shop_id)->first();

        $dichvudats = $this->dicvudatService->hoanthanh();
        $tongtien = DichVuDat::where('trangthai', 3)
            ->where('shop_id', $shop->id)

            ->sum('tongtien');
        foreach ($dichvudats as $dichvudat) {
            $soluongdv = DichVu_DichVuDat::where('dichvudat_id', $dichvudat->id)->count();
            $dichvudat->soluongdv = $soluongdv;
            array_push($lichdatdvstemp, $dichvudat);
        }

        if (!empty($dichvudats)) {
            $id_shop = $dichvudats[0]->shop_id;
            $listnhanvien = User::where('shop_id', $id_shop)->where('quyen_id', 4)->where('trangthai', 1)->get();
        } else {
            $listnhanvien = [];
        }
        $options = new Options();
        $options->set('defaultFont', public_path('fonts/Roboto-ThinItalic.ttf'));
        $dompdf = new Dompdf($options);
        $html = view('report', [
            'lichdatdvs' => $lichdatdvstemp,
            'shop' => $shop,
            'users' => $user,
            'listnhanviens' => $listnhanvien,
            'tongtien' => $tongtien,
        ])->render();

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream('document.pdf', ['Attachment' => false]);
    }
}
