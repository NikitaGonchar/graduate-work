<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Http\Requests\CreateBrand;
use App\Http\Requests\EditBrand;
use App\Http\Requests\EditCategory;
use App\Http\Requests\EditAdvert;
use App\Http\Requests\AdvertRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Advert;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function view()
    {
        return view('brand.create');
    }

    public function create(CreateBrand $request)
    {
        $data = $request->validated();
        $brand = new Brand($data);
        $brand->save();

        session()->flash('success', 'Бренд добавлен!');
        return redirect()->back();
    }

    public function delete(Brand $brand)
    {
        $brand->delete();
        session()->flash('success', 'Бренд удален');
        return redirect()->back();
    }

    public function show(Brand $brand)
    {
        return view('brand.show', compact('brand'));
    }

    public function edit(Brand $brand, EditBrand $request)
    {
        $data = $request->validated();
        $brand->fill($data);
        $brand->save();
        session()->flash('success', 'Бренд изменен');
        return redirect()->route('showbrand', ['brand' => $brand->id]);
    }

    public function editForm(Brand $brand)
    {
        return view('brand.edit', compact('brand'));
    }

    public function list()
    {
        $brands = Brand::all();
        return view('brand.list', ['brands' => $brands]);
    }
}
