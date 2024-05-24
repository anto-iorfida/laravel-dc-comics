@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <h1 class="my-5">Modifica la Card: {{$comic->title}}</h1>

            <form action="{{ route('comics.update', ['comic' => $comic]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="title" class="form-label">Modifica titolo</label>
                    <input type="text" class="form-control" id="title" value="{{$comic->title}}" name="title">
                </div>
                <div class="mb-3">
                    <label for="thumb" class="form-label">Img</label>
                    <input type="text" class="form-control" id="thumb" value="{{$comic->thumb}}" name="thumb">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Descrizione</label>
                    <textarea class="form-control" id="description" name="description" rows="3">{{$comic->description}}"</textarea>
                </div>
                <div class="mb-3">
                    <label for="sale_date" class="form-label">Data</label>
                    <input type="date" class="form-control" id="sale_date" name="sale_date" value="{{$comic->sale_date}}">
                </div>
                
                <div class="mb-3">
                    <label for="price" class="form-label">Prezzo</label>
                    <input type="text" class="form-control" id="price" name="price"
                    value="{{$comic->price}}">
                </div>
                <div class="mb-3">
                    <label for="series" class="form-label">Series</label>
                    <input type="text" class="form-control" id="series" name="series"
                    value="{{$comic->series}}">
                </div>
                <div class="mb-3">
                    <label for="type" class="form-label">Tipo</label>
                    <select class="form-select" type="type" name="type" aria-label="Default select example">
                        <option {{ $comic->type === 'comic-book' ? 'selected' : ''}} value="comic-book">comic book</option>
                        <option {{ $comic->type === 'graphic-novel' ? 'selected' : ''}}  value="graphic-novel">graphic novel</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mb-3">Confirm identity</button>
        </div>
        </form>
    </section>
@endsection
