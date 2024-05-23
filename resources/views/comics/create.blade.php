@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <h1 class="my-5">Crea Nuova Card</h1>

            <form action="{{ route('comics.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Creazione titolo</label>
                    <input type="text" class="form-control" id="title" placeholder="create title" name="title">
                </div>
                <div class="mb-3">
                    <label for="thumb" class="form-label">Img</label>
                    <input type="text" class="form-control" id="thumb" placeholder="create thumb" name="thumb">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Descrizione</label>
                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label for="sale_date" class="form-label">Data</label>
                    <textarea class="form-control" id="sale_date" name="sale_date" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Prezzo</label>
                    <input type="text" class="form-control" id="price" name="price"
                        placeholder="Another input placeholder">
                </div>
                <div class="mb-3">
                    <label for="series" class="form-label">Series</label>
                    <input type="text" class="form-control" id="series" name="series"
                        placeholder="Another input placeholder">
                </div>
                <div class="mb-3">
                    <label for="type" class="form-label">Tipo</label>
                    <select class="form-select" type="type" name="type" aria-label="Default select example">
                        <option selected>Scegli</option>
                        <option value="comic-book">comic book</option>
                        <option value="graphic-novel">graphic novel</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mb-3">Confirm identity</button>
        </div>
        </form>
    </section>
@endsection
