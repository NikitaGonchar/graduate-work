<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdvertRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Advert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class AdvertController extends Controller
{
    public function view()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('vapes.create', compact('categories', 'brands'));
    }

    public function create(AdvertRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $destination_path = 'public/images/vapes';
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            $path = $request->file('image')->storeAs($destination_path, $image_name);

            $data['image'] = $image_name;
        }
        $advert = new Advert($data);
        $user = $request->user();
        $advert->user()->associate($user);
        $advert->save();
        $advert->categories()->attach($data['categories']);
        $advert->brands()->attach($data['brands']);
        session()->flash('success', 'Объявление добавлено!');
        return redirect()->back();
    }

}
