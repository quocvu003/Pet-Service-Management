<?php

namespace App\Http\Services\Menu;

use App\Models\Menu;

use Illuminate\Support\Facades\Session;

class MenuService
{
    // menu ít, k cần phân trang
    public function getParent()
    {
        return Menu::where('danhmuccha', 0)->get();
    }
    // menu nhiều, cần phân trang
    public function getAll()
    {
        return Menu::orderByDesc('id')->paginate(20);
    }

    public function show()
    {
        return Menu::select('name', 'id')
            ->where('danhmuccha', 0)
            ->orderbyDesc('id')
            ->get();
    }

    public function create($request)
    {
        try {
            menu::create([
                'name' => (string) $request->input('name'),
                'danhmuccha' => (int) $request->input('danhmuccha'),
                'description' => (string) $request->input('description'),
                'content' => (string) $request->input('content'),
                'active' => (string) $request->input('active'),

            ]);

            Session::flash('success', 'Tạo Danh mục thành công');
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }
        return true;
    }

    public function update($request, $menu): bool
    {
        if ($request->input('danhmuccha') != $menu->id) {
            $menu->danhmuccha = (string) $request->input('danhmuccha');
        }
        $menu->name = (string) $request->input('name');
        $menu->description = (string) $request->input('description');
        $menu->content = (string) $request->input('content');
        $menu->active = (string) $request->input('active');
        $menu->save();

        Session::flash('success', 'Cập nhật danh mục thành công');
        return true;
    }

    public function destroy($request)
    {
        $id = (int) $request->input('id');
        $menu = Menu::where('id', $id)->first();

        if ($menu) {
            return Menu::where('id', $menu->id)->orWhere('danhmuccha', $id)->delete();
        }
        return false;
    }

    public function getId($id)
    {
        return Menu::where('id', $id)->where('active', 1)->firstOrFail();
    }

    public function getProduct($menu)
    {

        return $menu->products()
            ->select('id', 'name', 'price', 'price_sale', 'thumb')
            ->where('active', 1)
            ->orderBy('id')
            ->paginate(12);
    }
}
