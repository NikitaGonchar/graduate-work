@extends('layout')

@section('title', 'My offers')

@section('content')
    @if($adverts->isEmpty())
        <h2>Объявления отсутствуют</h2>
    @endif
    @foreach($adverts as $advert)
        <div class="ms-3">
            <h3>{{$advert->title}}</h3>
            <p class="mb-2">
                <image width="300px" src="{{asset('/storage/images/vapes/' . $advert->image)}}"></image>
            </p>
            <a class="text-decoration-none"
               href="{{route('showoffer', ['advert' => $advert->id])}}"><strong>Подробнее</strong></a>
            <br>
            <a class="text-decoration-none"
               href="{{route('editofferform', ['advert' => $advert->id])}}"><strong>Изменить</strong></a>
            <form class="mt-2" action="{{route('deleteoffer', ['advert' => $advert->id])}}" method="post">
                @csrf
                <button type="submit" class="btn btn-outline-danger">
                    Удалить
                </button>
            </form>
            <hr>
        </div>
    @endforeach
    <div class="d-flex justify-content-center">
        {!! $adverts->links() !!}
    </div>
@endsection
