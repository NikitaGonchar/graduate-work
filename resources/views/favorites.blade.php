@extends('layout')

@section('title', 'Favorites')

@section('content')
{{--@foreach($vapes as $vape)--}}
{{--    <h3>Объявление: {{$vape->title}}</h3>--}}
{{--    <a class="text-decoration-none" href="{{route('showoffer', ['vape' => $vape->id])}}"><strong>Подробнее</strong></a>--}}
{{--@endforeach--}}
    @foreach($favorites as $favorite)
        <h3>Объявление: {{$favorite->vape->title}}</h3>
    @endforeach
@endsection
