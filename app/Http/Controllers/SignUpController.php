<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignUpRequest;
use App\Models\User;
use Illuminate\Http\Request;

class SignUpController extends Controller
{
    public function signUpForm(){
        return view('signup');
    }
    public function signUp(SignUpRequest $request){
        $data = $request->validated();
        $user = new User($data);
        $user->save();
        session()->flash('success', 'Пользователь зарегистрирован');
        return redirect()->route('main');
    }
}
