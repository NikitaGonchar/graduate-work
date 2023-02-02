@extends('layout')

@section('title', 'SignIN')

@section('content')
    <h1>Вход</h1>
    <form class="me-5 ms-3" action="{{route('signin')}}" method="post">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input value="{{old('email')}}" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="email">
            @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Пароль</label>
            <input value="{{old('password')}}" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="пароль">
            @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Войти</button>
        </div>
    </form>
@endsection
