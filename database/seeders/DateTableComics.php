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
            $newPasta->descriptio = $comicItem['description'];
            $newPasta->thumb = $comicItem['thumb'];
            $newPasta->price = $comicItem['price'];
            $newPasta->series = $comicItem['series'];
            $newPasta->sale_date = $comicItem['sale_date'];
            $newPasta->type = $comicItem['type'];
            $newPasta->save();

        }


    }
}
