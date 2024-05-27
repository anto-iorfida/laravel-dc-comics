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
                                    <form id="delete-form-{{ $comicItem->id }}" action="{{ route('comics.destroy', ['comic' => $comicItem->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger js-delete-btn" data-comic-title="{{ $comicItem->title }}"  type="button">Elimina</button>
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

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteButtons = document.querySelectorAll('.js-delete-btn');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function (event) {
                // ottenere il modulo più vicino al bottone cliccato
                const form = button.closest('form');

                // ottenere il titolo del fumetto dall'attributo data-comic-title
                const comicTitle = button.getAttribute('data-comic-title');
                
                // mostrare il popup di conferma
                const confirmed = confirm(`Sei sicuro di voler eliminare "${comicTitle}"?`);

                // se l'utente conferma, invia il modulo
                // altrimenti, non fare nulla (azione di eliminazione annullata)
                if (confirmed) {
                    form.submit();
                }
            });
        });
    });
</script>
