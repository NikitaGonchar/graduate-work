@extends('layout')

@section('title', 'Edit category')

@section('content')
    <form class="me-5 ms-3" action="{{route('editcategory', ['category' => $category->id])}}" method="post">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Название товара</label>
            <input value="{{old('name', $category->name)}}" type="text"
                   class="form-control @error('name') is-invalid @enderror" name="name" placeholder="название">
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Добавить</button>
        </div>
    </form>
@endsection
