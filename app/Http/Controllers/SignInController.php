<?php

namespace App\Http\Controllers;


use App\Http\Requests\SignInRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Termwind\render;

class SignInController extends Controller
{
    public function signInForm()
    {
        return view('signin');
    }

    public function signIn(SignInRequest $request)
    {
        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {
            session()->flash('success', 'Авторизация прошла успешно!');
            return redirect(route('main'));
        }
        session()->flash('error', 'Данные введены неверно');

        return redirect()->route('signinform');
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('main'));
    }
}
