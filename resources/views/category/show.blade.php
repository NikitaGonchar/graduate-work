@extends('layout')

@section('title', 'Show category')

@section('content')
    <h2>Наименование категории:</h2>
    <h4>{{ $category->name }}</h4>
@endsection
