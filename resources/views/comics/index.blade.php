@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <h1 class="my-5">Lista Card</h1>

            <div class="row row-cols-4">

                @foreach ($comics as $comicItem)
                    <div class="col">
                        <div class="card m-3" style="width: 18rem;">
                            <img src="{{ $comicItem->thumb }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $comicItem->title }}</h5>
                                <div class="overflow-auto description-container">
                                    <p class="card-text">{{ $comicItem->description }}</p>
                                </div>
                                <p class="card-text">{{ $comicItem->series }}</p>
                                <p class="card-text">{{ $comicItem->price }}</p>
                                <p class="card-text">{{ $comicItem->sale_date }}</p>
                                <p class="card-text">{{ $comicItem->type }}</p>
                                <a href="{{ route('comics.show', ['comic' => $comicItem->id]) }}" class="btn btn-primary">piu info</a>
                                <a href="{{ route('comics.edit', ['comic' => $comicItem->id]) }}" class="btn btn-primary">modifica</a>

                                <div class="py-1">
                                    <form action="{{ route('comics.destroy', ['comic' => $comicItem->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger js-delete-btn"  type="submit">Elimina</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </section>

    <style>
        .description-container {
            max-height: 150px;
            /* Imposta l'altezza massima desiderata */
            overflow-y: auto;
        }
    </style>
@endsection
