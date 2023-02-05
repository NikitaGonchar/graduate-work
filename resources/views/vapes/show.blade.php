@extends('layout')

@section('title', 'Show offer')

@section('content')
    <div class="row">
        <div class="col-md-3">
            <p class="mb-0">
                <image width="300px" src="{{asset('/storage/images/vapes/' . $vape->image)}}"></image>
            </p>
        </div>
        <div class="col-md-4 ms-2">
            <h1>{{ $vape->title }}</h1>
            <p>Дата создания объявдпения: {{ $vape->created_at?->format('Y/m/d') }}</p>
            <h4 class="mt-5">Цена: {{$vape->price}}</h4>
            <div class="mt-3">
                <h5>Категории:</h5>
                @foreach($vape->categories as $category)
                    <h5>{{ $category->name}}</h5>
                @endforeach
            </div>
            <div class="mt-3">
                <h5>Производители:</h5>
                @foreach($vape->brands as $brand)
                    <h5>{{ $brand->name}}</h5>
                @endforeach
            </div>
        </div>
        <div class="col-md-4">
            <h3>Имя пользователя: {{$vape->user->name}}</h3>
            <h5 class="mt-5">Контактная информация: {{$vape->contacts}}</h5>
        </div>
        <p style="font-size: 20px" class="mt-3 ms-3">Описание: {{$vape->description}}</p>
    </div>
@endsection
