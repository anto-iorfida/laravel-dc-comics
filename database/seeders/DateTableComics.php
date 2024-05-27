<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comic;

class DateTableComics extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comicArray = config('comics');


        foreach($comicArray as $comicItem){

            $newPasta = new Comic();
            $newPasta->title = $comicItem['title'];
            $newPasta->description = $comicItem['description'];
            $newPasta->thumb = 'https://picsum.photos/200';
            $newPasta->price = $comicItem['price'];
            $newPasta->series = $comicItem['series'];
            $newPasta->sale_date = $comicItem['sale_date'];
            $newPasta->type = $comicItem['type'];
            $newPasta->save();

        }

         // Aggiorna il campo 'thumb' per tutti i record nel database
        $this->updateThumbForAllComics();
    }
     /**
     * Update the thumb field for all comics.
     *
     * @return void
     */
    public function updateThumbForAllComics()
    {
        // Esegui un aggiornamento di massa per cambiare il campo 'thumb' di tutti i record
        Comic::query()->update(['thumb' => 'https://picsum.photos/200']);
    }
}
