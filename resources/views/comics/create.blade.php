@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <h1 class="my-5">Crea Nuova Card</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('comics.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Creazione titolo</label>
                    <input type="text" class="form-control" id="title" placeholder="create title" name="title" value="{{ old('title') }}">
                </div>
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="mb-3">
                    <label for="thumb" class="form-label">Img</label>
                    <input type="text" class="form-control" id="thumb" placeholder="create thumb" name="thumb" value="{{ old('thumb') }}">
                </div>
                @error('thumb')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="mb-3">
                    <label for="description" class="form-label">Descrizione</label>
                    <textarea class="form-control" id="description" name="description" rows="3">{{ old('description') }}</textarea>
                </div>
                @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="mb-3">
                    <label for="sale_date" class="form-label">Data</label>
                    <input type="date" class="form-control" id="sale_date" name="sale_date" value="{{ old('sale_date') }}">
                </div>
                @error('sale_date')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="mb-3">
                    <label for="price" class="form-label">Prezzo</label>
                    <input type="text" class="form-control" id="price" name="price" value="{{ old('price') }}">
                </div>
                @error('price')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="mb-3">
                    <label for="series" class="form-label">Series</label>
                    <input type="text" class="form-control" id="series" name="series" value="{{ old('series') }}">
                </div>
                @error('series')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="mb-3">
                    <label for="type" class="form-label">Tipo</label>
                    <select class="form-select" type="type" name="type" aria-label="Default select example">
                        <option @selected(old('type') === '') >Scegli</option>
                        <option @selected(old('type') === 'comic-book') value="comic-book">comic book</option>
                        <option @selected(old('type') === 'graphic-novel') value="graphic-novel">graphic novel</option>
                    </select>
                </div>
                @error('type')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <button type="submit" class="btn btn-primary mb-3">Confirm identity</button>
        </div>
        </form>
    </section>
@endsection
