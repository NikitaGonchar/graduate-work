<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditAdvert;
use App\Http\Requests\AdvertRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Favorite;
use App\Models\User;
use App\Models\Advert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MainController extends Controller
{
    public function main(Request $request)
    {
        $query = Advert::sortable()
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
        $adverts = $query
            ->paginate(2)
            ->appends($request->query());
        return view('welcome', compact('adverts', 'categories', 'brands'));
    }

    public function delete(Advert $advert)
    {
        $advert->delete();
        session()->flash('success', 'Объявление удалено');
        return redirect()->back();
    }

    public function show(Advert $advert)
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('vapes.show', compact('advert', 'categories', 'brands'));
    }

    public function edit(Advert $advert, EditAdvert $request)
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
        $advert->fill($data);
        $advert->categories()->sync($data['categories']);
        $advert->brands()->sync($data['brands']);
        $advert->save();
        session()->flash('success', 'Объявление обновлено');
        return redirect()->route('showoffer', ['advert' => $advert->id]);
    }

    public function editForm(Advert $advert)
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('vapes.edit', compact('advert', 'categories', 'brands'));
    }

    public function userOffer(Request $request)
    {
        $user = $request->user();
        $adverts = $user->adverts()->paginate(1);
        return view('myoffers', compact('adverts'));
    }

    public function favorites(Request $request)
    {
        $favorites = Favorite::query()->where('user_id', $request->user()->id)->paginate(1);
        return view('favorites', compact('favorites'));
    }

    public function addFavorites(Request $request, Advert $advert)
    {
        $favorite = new Favorite();
        $favorite->advert_id = $advert->id;
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
