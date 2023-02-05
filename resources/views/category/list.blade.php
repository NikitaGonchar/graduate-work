@extends('layout')

@section('title', 'Category list')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Наименование категории</th>
            <th scope="col">Раскрыть</th>
            <th scope="col">Изменить</th>
            <th scope="col">Удалить</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <th scope="row">{{ $category->id }}</th>
                <td>{{ $category->name }}</td>
                <td>
                    <a class="text-decoration-none" href="{{route('showcategory', ['category' => $category->id])}}">Раскрыть</a>
                <td>
                    <a class="text-decoration-none" href="{{route('editcategoryform', ['category' => $category->id])}}">Изменить</a>

                </td>
                <td>
                    <form action="{{route('deletecategory', ['category' => $category->id])}}" method="post">
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
