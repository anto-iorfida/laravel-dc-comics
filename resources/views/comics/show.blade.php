@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="card-title">{{ $comic->title }}</h1>
        <img src="{{ $comic->thumb}}" alt="">
        <p class="card-text">{{ $comic->description }}</p>
        <p class="card-text">{{ $comic->series }}</p>
        <p class="card-text">{{ $comic->sale_date }}</p>
        <p class="card-text">{{ $comic->price }}</p>
        <p class="card-text">{{ $comic->type }}</p>
    </div>
@endsection
