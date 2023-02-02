@extends('layout')

@section('title', 'My offers')

@section('content')
    @if($user->vapes->isEmpty())
        <h2>Объявления отсутствуют</h2>
    @endif
@foreach($user->vapes as $vape)
    <div class="ms-3">
        <h3>{{$vape->title}}</h3>
        <p class="mb-2"><image width="300px" src="{{asset('/storage/images/vapes/' . $vape->image)}}"></image></p>
        <a class="text-decoration-none" href="{{route('showoffer', ['vape' => $vape->id])}}"><strong>Подробнее</strong></a>
        <br>
        <a class="text-decoration-none" href="{{route('editofferform', ['vape' => $vape->id])}}"><strong>Изменить</strong></a>
        <form class="mt-2" action="{{route('deleteoffer', ['vape' => $vape->id])}}" method="post">
            @csrf
            <button type="submit" class="btn btn-outline-danger">
                Удалить
            </button>
        </form>
            <hr>
    </div>
@endforeach
@endsection
