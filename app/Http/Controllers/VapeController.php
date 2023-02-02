<?php

namespace App\Http\Controllers;

use App\Http\Requests\VapeRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Vape;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class VapeController extends Controller
{
    public function view(){
        $categories = Category::all();
        $brands = Brand::all();
        return view('vapes.create', compact('categories', 'brands'));
    }
    public function create(VapeRequest $request){
        $data = $request->validated();
        if ($request->hasFile('image')){
            $destination_path = 'public/images/vapes';
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            $path = $request->file('image')->storeAs($destination_path, $image_name);

            $data['image'] = $image_name;
        }
        $vape = new Vape($data);
        $user = $request->user();
        $vape->user()->associate($user);
        $vape->save();
        $vape->categories()->attach($data['categories']);
        $vape->brands()->attach($data['brands']);
        session()->flash('success', 'Объявление добавлено!');
        return redirect()->back();
    }

}
