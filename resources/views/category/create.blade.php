@extends('layout')

@section('title', 'Add category')

@section('content')
    <form class="ms-3 me-5" action="{{route('createcategory')}}" method="post">
        @csrf
        <div class="mb-3 -ml-20px ">
            <label for="name" class="form-label">Название категории</label>
            <input value="{{old('name')}}" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="название" >
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Добавить</button>
        </div>
    </form>
@endsection
