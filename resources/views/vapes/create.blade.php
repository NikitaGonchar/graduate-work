@extends('layout')

@section('title', 'Add')

@section('content')
    <form class="me-5 ms-3" action="{{route('createoffer')}}" enctype="multipart/form-data" method="post">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Название товара</label>
            <input value="{{old('title')}}" type="text" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="название" >
            @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="contacts" class="form-label">Контактные данные</label>
            <input value="{{old('contacts')}}" type="text" class="form-control @error('contacts') is-invalid @enderror" name="contacts" placeholder="название">
            @error('contacts')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Цена</label>
            <input value="{{old('price')}}" type="number" class="form-control @error('price') is-invalid @enderror" name="price" placeholder="цена">
            @error('price')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Описание товара</label>
            <textarea name="description" class="form-control @error('description') is-invalid @enderror"  rows="3" placeholder="описание"></textarea>
            @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Категории товара:</label>
            @error('categories')
            <div>{{ $message }}</div>
            @enderror
            @foreach($categories as $category)
                <div class="form-check">
                    <input type="checkbox" name="categories[]" value="{{ $category->id }}"
                           class="form-check-input"> {{ $category->name }}
                </div>
        </div>
        @endforeach
        <div class="form-group">
            <label for="">Проихводитель товара:</label>
            @error('brands')
            <div>{{ $message }}</div>
            @enderror
            @foreach($brands as $brand)
                <div class="form-check">
                    <input type="checkbox" name="brands[]" value="{{ $brand->id }}"
                           class="form-check-input"> {{ $brand->name }}
                </div>
        </div>
        @endforeach
            <div class="form-group">
                <label for="image">Картинка для новости:</label>
                <br>
                <input type="file" class="form-control-file" id="image" name="image">
            </div>
        <div class="col-12 mt-3">
            <button type="submit" class="btn btn-primary">Добавить</button>
        </div>
        </form>

@endsection
