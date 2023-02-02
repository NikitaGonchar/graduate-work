@extends('layout')

@section('title', 'SignUp')

@section('content')
   <h1>Регистрация</h1>
   <form class="me-5 ms-3" action="{{route('signup')}}" method="post">
       @csrf
       <div class="mb-3">
           <label for="name" class="form-label">Имя</label>
           <input value="{{old('name')}}" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="имя">
           @error('name')
           <div class="invalid-feedback">{{ $message }}</div>
           @enderror
       </div>
       <div class="mb-3">
           <label for="email" class="form-label">Email</label>
           <input value="{{old('email')}}" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="email">
           @error('email')
           <div class="invalid-feedback">{{ $message }}</div>
           @enderror
       </div>
       <div class="mb-3">
           <label for="phone" class="form-label">Телефон</label>
           <input value="{{old('phone')}}" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="телефон">
           @error('phone')
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
       <div class="mb-3">
           <label for="password_confirmation" class="form-label"> Повторите пароль</label>
           <input value="{{old('password_confirmation')}}" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" placeholder="повторите пароль">
           @error('password_confirmation')
           <div class="invalid-feedback">{{ $message }}</div>
           @enderror
       </div>
       <div class="col-12">
           <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
       </div>
   </form>
@endsection
