@extends('layout')

@section('title', 'Show brand')

@section('content')
    <h2>Наименование бренда:</h2>
    <h4>{{ $brand->name }}</h4>
@endsection
