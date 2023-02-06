@extends('layout')

@section('title', 'Show offer')

@section('content')
    <div class="row">
        <div class="col-md-3">
            <p class="mb-0">
                <image width="300px" src="{{asset('/storage/images/vapes/' . $advert->image)}}"></image>
            </p>
        </div>
        <div class="col-md-4 ms-2">
            <h1>{{ $advert->title }}</h1>
            <p>Дата создания объявдпения: {{ $advert->created_at?->format('Y/m/d') }}</p>
            <h4 class="mt-5">Цена: {{$advert->price}}</h4>
            <div class="mt-3">
                <h5>Категории:</h5>
                @foreach($advert->categories as $category)
                    <h5>{{ $category->name}}</h5>
                @endforeach
            </div>
            <div class="mt-3">
                <h5>Производители:</h5>
                @foreach($advert->brands as $brand)
                    <h5>{{ $brand->name}}</h5>
                @endforeach
            </div>
        </div>
        <div class="col-md-4">
            <h3>Имя пользователя: {{$advert->user->name}}</h3>
            <h5 class="mt-5">Контактная информация: {{$advert->contacts}}</h5>
        </div>
        <p style="font-size: 20px" class="mt-3 ms-3">Описание: {{$advert->description}}</p>
    </div>
@endsection
