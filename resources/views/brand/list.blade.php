@extends('layout')

@section('title', 'Brand list')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Название бренда</th>
            <th scope="col">Наименование бренда</th>
            <th scope="col">Раскрыть</th>
            <th scope="col">Изменить</th>
            <th scope="col">Удалить</th>
        </tr>
        </thead>
        <tbody>
        @foreach($brands as $brand)
            <tr>
                <th scope="row">{{ $brand->id }}</th>
                <td>{{ $brand->name }}</td>
                <td>
                <td>
                    <a class="text-decoration-none" href="{{route('showbrand', ['brand' => $brand->id])}}">Раскрыть</a>
                </td>
                <td><a class="text-decoration-none"
                       href="{{route('editbrandform', ['brand' => $brand->id])}}">Изменить</a></td>
                <td>
                    <form action="{{route('deletebrand', ['brand' => $brand->id])}}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger">
                            Удалить
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
