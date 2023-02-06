@extends('layout')

@section('title', 'Main')

@section('content')
    <h4 class="ms-3">Сортировка: @sortablelink('price', 'По цене'), @sortablelink('created_at', 'По дате')</h4>
    <div class="row mt-4">
        <div class="col-md-7 ms-3">
            @if($adverts->isEmpty())
                <h2>Объявления отсутствуют</h2>
            @endif
            @foreach($adverts as $advert)
                <article class="mb-3">
                    <p class="mb-1 h3"><strong>{{ $advert->title }}</strong></p>
                    <p class="mb-0">
                        <image width="200px" src="{{asset('/storage/images/vapes/' . $advert->image)}}"></image>
                    </p>
                    <p class="mb-0">Контактная ифнормация:</p>
                    <p class="mb-1">{{ $advert->contacts}}
                    <p class="mb-1">Цена: {{ $advert->price}}
                        <br>
                        <a class="text-decoration-none" href="{{route('showoffer', ['advert' => $advert->id])}}"><strong>Подробнее</strong></a>
                        <br>
                        @can('edit', $advert)
                            <a class="text-decoration-none"
                               href="{{route('editofferform', ['advert' => $advert->id])}}"><strong>Изменить</strong></a>
                            <br>
                    @endcan
                    <form action="{{route('addfavorites', ['advert' => $advert->id])}}" method="post">
                        @csrf
                        @if(auth()->check())
                            <button type="submit" class="btn btn-outline-primary mb-2">
                                Добавить в избранное
                            </button>
                        @endif
                    </form>
                    @can('delete', $advert)
                        <form action="{{route('deleteoffer', ['advert' => $advert->id])}}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger">
                                Удалить
                            </button>
                        </form>
                    @endcan
                    <hr>
                </article>
            @endforeach
        </div>
        <div class="col-md-4">
            <h4>Фильтрация:</h4>
            <ul class="list-unstyled">
                <form action="">
                    <p>Категории:</p>
                    @foreach($categories as $category)
                        <div class="form-check">
                            <input type="checkbox"
                                   name="categories[]"
                                   value="{{ $category->id }}"
                                   @if(in_array($category->id, request()->get('categories', [])))
                                   checked
                                @endif
                            > {{ $category->name }}
                        </div>
                    @endforeach
                    <p>Производители:</p>
                    @foreach($brands as $brand)
                        <div class="form-check">

                            <input type="checkbox"
                                   name="brands[]"
                                   value="{{ $brand->id }}"
                                   @if(in_array($brand->id, request()->get('brands', [])))
                                   checked
                                @endif
                            > {{ $brand->name }}
                        </div>
                    @endforeach
                    <button class="btn btn-primary">Поиск</button>

                </form>
            </ul>
        </div>
        <div class="d-flex justify-content-center">
            {!! $adverts->links() !!}
        </div>
    </div>
@endsection
