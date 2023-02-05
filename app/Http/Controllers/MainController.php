<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditVape;
use App\Http\Requests\VapeRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Favorite;
use App\Models\User;
use App\Models\Vape;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MainController extends Controller
{
    public function main(Request $request)
    {
        $query = Vape::sortable()
            ->with('user', 'categories', 'brands')
            ->latest();
        if ($request->has('categories')) {
            $query->whereHas('categories', function ($q) use ($request) {
                $q->whereIn('categories.id', $request->get('categories'));
            });
        }
        if ($request->has('brands')) {
            $query->whereHas('brands', function ($q) use ($request) {
                $q->whereIn('brands.id', $request->get('brands'));
            });
        }
        if ($request->has('title')) {
            $search = '%' . $request->get('title') . '%';
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', $search);
            });
        }
        $categories = Category::all();
        $brands = Brand::all();
        $vapes = $query
            ->paginate(2)
            ->appends($request->query());
        return view('welcome', compact('vapes', 'categories', 'brands'));
    }

    public function delete(Vape $vape)
    {
        $vape->delete();
        session()->flash('success', 'Объявление удалено');
        return redirect()->back();
    }

    public function show(Vape $vape)
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('vapes.show', compact('vape', 'categories', 'brands'));
    }

    public function edit(Vape $vape, EditVape $request)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $destination_path = 'public/images/vapes';
            if ($request->file('image') != '' && $request->file('image') != null) {
                $file_old = $destination_path . $request->file('image');
                unlink($file_old);
            }
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $request->file('image')->storeAs($destination_path, $filename);

            $data['image'] = $filename;
        }
        $vape->fill($data);
        $vape->categories()->sync($data['categories']);
        $vape->brands()->sync($data['brands']);
        $vape->save();
        session()->flash('success', 'Объявление обновлено');
        return redirect()->route('showoffer', ['vape' => $vape->id]);
    }

    public function editForm(Vape $vape)
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('vapes.edit', compact('vape', 'categories', 'brands'));
    }

    public function userOffer(Request $request)
    {
        $user = $request->user();
        $vapes = $user->vapes()->paginate(1);
        return view('myoffers', compact('vapes'));
    }

    public function favorites(Request $request)
    {
        $favorites = Favorite::query()->where('user_id', $request->user()->id)->paginate(1);
        return view('favorites', compact('favorites'));
    }

    public function addFavorites(Request $request, Vape $vape)
    {
        $favorite = new Favorite();
        $favorite->vape_id = $vape->id;
        $favorite->user_id = $request->user()->id;
        $favorite->save();
        session()->flash('success', 'Объявление добавлено в избранное');
        return redirect()->back();
    }

    public function deleteFavorite(Favorite $favorite)
    {
        $favorite->delete();
        session()->flash('success', 'Объявление удалено из избранного');
        return redirect()->back();
    }
}
