<?php


namespace App\Http\View\Composers;


use App\Http\Services\DanhMucService;



use Illuminate\View\View;

class UserComposer
{
    protected $danhmucService;

    public function __construct(DanhMucService $danhmucService)
    {
        $this->danhmucService = $danhmucService;
    }

    public function compose(View $view)
    {
        $view->with('danhmucs', $this->danhmucService->getAll());
    }
}
