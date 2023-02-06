@extends('layout')

@section('title', 'Favorites')

@section('content')
    @if($favorites->isEmpty())
        <h2>Объявления отсутствуют</h2>
    @endif
    @foreach($favorites as $favorite)
        <div class="ms-3">
            <h3>{{$favorite->advert->title}}</h3>
            <p class="mb-2">
                <image width="300px" src="{{asset('/storage/images/vapes/' . $favorite->advert->image)}}"></image>
            </p>
            <a class="text-decoration-none" href="{{route('showoffer', ['advert' => $favorite->advert->id])}}"><strong>Подробнее</strong></a>
            <br>
            <form class="mt-2" action="{{route('deletefavorites', ['favorite' => $favorite->id])}}" method="post">
                @csrf
                <button type="submit" class="btn btn-outline-danger">
                    Удалить
                </button>
            </form>
            <hr>
        </div>
    @endforeach
    <div class="d-flex justify-content-center">
        {!! $favorites->links() !!}
    </div>
@endsection
