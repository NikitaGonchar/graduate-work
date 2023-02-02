<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [\App\Http\Controllers\MainController::class, 'main'])
    ->name('main');
Route::get('/vapes', [\App\Http\Controllers\VapeController::class, 'view'])
    ->name('add');
Route::post('/vapes/create', [\App\Http\Controllers\VapeController::class, 'create'])
    ->name('createoffer');
Route::post('/vapes/{vape}/delete', [\App\Http\Controllers\MainController::class, 'delete'])
    ->name('deleteoffer');
Route::get('/vapes/{vape}/show', [\App\Http\Controllers\MainController::class, 'show'])
    ->name('showoffer');
Route::get('/vapes/{vape}/editform', [\App\Http\Controllers\MainController::class, 'editForm'])
    ->name('editofferform')->middleware('can:edit,vape');
Route::post('/vapes/{vape}/edit', [\App\Http\Controllers\MainController::class, 'edit'])
    ->name('editoffer')->middleware('can:edit,vape');
Route::get('/vapes/myoffers', [\App\Http\Controllers\MainController::class, 'userOffer'])
    ->name('myoffers');
Route::get('/favorites', [\App\Http\Controllers\MainController::class, 'favorites'])
    ->name('favorites');
Route::post('/addfavorites/{vape}', [\App\Http\Controllers\MainController::class, 'addFavorites'])
    ->name('addfavorites');


Route::get('/signup', [\App\Http\Controllers\SignUpController::class, 'signUpForm'])
    ->name('signupform');
Route::post('/signup/add', [\App\Http\Controllers\SignUpController::class, 'signUp'])
    ->name('signup');
Route::get('/signinform', [\App\Http\Controllers\SignInController::class, 'signInForm'])
    ->name('signinform');
Route::post('/signinform/signin', [\App\Http\Controllers\SignInController::class, 'signIn'])
    ->name('signin');
Route::post('/logout', [\App\Http\Controllers\SignInController::class, 'logout'])
    ->name('logout');


Route::get('/categories', [\App\Http\Controllers\CategoryController::class, 'view'])
    ->name('addcategory')->middleware('can:create,' . \App\Models\Category::class);
Route::post('/categories/create', [\App\Http\Controllers\CategoryController::class, 'create'])
    ->name('createcategory')->middleware('can:create,' . \App\Models\Category::class);
Route::post('/categories/{category}/delete', [\App\Http\Controllers\CategoryController::class, 'delete'])
    ->name('deletecategory');
Route::get('/categories/{category}/show', [\App\Http\Controllers\CategoryController::class, 'show'])
    ->name('showcategory');
Route::get('/categories/{category}/editform', [\App\Http\Controllers\CategoryController::class, 'editForm'])
    ->name('editcategoryform');
Route::post('/categories/{category}/edit', [\App\Http\Controllers\CategoryController::class, 'edit'])
    ->name('editcategory');
Route::get('/categories/list', [\App\Http\Controllers\CategoryController::class, 'list'])
    ->name('categorylist');



Route::get('/brands', [\App\Http\Controllers\BrandController::class, 'view'])
    ->name('addbrand')->middleware('can:create,' . \App\Models\Brand::class);
Route::post('/brands/create', [\App\Http\Controllers\BrandController::class, 'create'])
    ->name('createbrand')->middleware('can:create,' . \App\Models\Brand::class);
Route::post('/brands/{brand}/delete', [\App\Http\Controllers\BrandController::class, 'delete'])
    ->name('deletebrand');
Route::get('/brands/{brand}/show', [\App\Http\Controllers\BrandController::class, 'show'])
    ->name('showbrand');
Route::get('/brands/{brand}/editform', [\App\Http\Controllers\BrandController::class, 'editForm'])
    ->name('editbrandform');
Route::post('/brands/{brand}/edit', [\App\Http\Controllers\BrandController::class, 'edit'])
    ->name('editbrand');
Route::get('/brands/list', [\App\Http\Controllers\BrandController::class, 'list'])
    ->name('brandlist');

