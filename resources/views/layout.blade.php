<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('main') }}">VapeBaraholka</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <form action="{{ route('main') }}">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Название" name="title"
                       value="{{ request()->get('title') }}">
            </div>
        </form>
    </div>
    <ul style="align-items: center; text-align: center" class="navbar-nav mr-auto">
    @if(!auth()->check())
        <li>Для размещения объявления авторизируйтесь</li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('signupform')}}">Регистрация</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('signinform')}}">Войти</a>
            </li>
        @endif
        @if(auth()->check())
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('add')}}">Добавить</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('myoffers')}}">Мои объявления</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('favorites')}}">Избранное</a>
            </li>
        @endif
        @can('create', \App\Models\Category::class)
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('addcategory')}}">Добавить категорию</a>
            </li>
        @endcan
        @can('view', \App\Models\Category::class)
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('categorylist')}}">Список категорий</a>
            </li>
        @endcan
        @can('create', \App\Models\Brand::class)
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('addbrand')}}">Добавить бренд</a>
            </li>
        @endcan
        @can('view', \App\Models\Brand::class)
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('brandlist')}}">Список брендов</a>
            </li>
        @endcan
        <li>
            @if (auth()->check())
                <form action="{{ route('logout') }}" method="post" class="form-inline">
                    @csrf
                    <button class="btn btn-danger">Выйти</button>
                </form>
            @endif
        </li>

    </ul>
</nav>
@include('flash-messages')
@yield('content')
</body>
</html>

