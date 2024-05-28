<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comic;
use Illuminate\Support\Facades\Validator;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::all();
        // dd($comics);
        $data = ['comics' => $comics];
        return view('comics.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $comic = Comic::find($id);
        // $data = ['comic' => $comic];
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formData = $request->all();
        $this->validation($formData);
        // dd($formData);
        $newComic = new Comic();
        // $newComic->title =$formData['title'];
        // $newComic->thumb =$formData['thumb'];
        // $newComic->sale_date =$formData['sale_date'];
        // $newComic->description =$formData['description'];
        // $newComic->price =$formData['price'];
        // $newComic->series =$formData['series'];
        // $newComic->type =$formData['type'];
        $newComic->fill($formData);
        $newComic->save();

        return redirect()->route('comics.show', ['comic' => $newComic]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comic = Comic::find($id);
        $data = ['comic' => $comic];
        return view('comics.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comic = Comic::find($id);

        $data = ['comic' => $comic];
        return view('comics.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $comic = Comic::findOrFail($id);
        $formData = $request->all();
        $this->validation($formData);

        $comic->update($formData);

        dd('comic aggiornato');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comic = Comic::findOrFail($id);
        $comic->delete();

        return redirect()->route('comics.index');
        // dd('comic eliminato');
    }

    private function validation($data)
    {
        $validator = Validator::make(
            $data,
            [
                'title' => 'required|min:5|max:50',
                'thumb' => 'required|max:250',
                'sale_date' => 'required|max:20',
                'price' => 'required|max:20',
                'series' => 'required|max:20',
                'type' => 'required|max:20',
                'description' => 'nullable|min:10|max:2000'
            ],
            [
                'title.required' => 'Il campo titolo è obbligatorio',
                'title.max' => 'Il campo titolo non può avere più di 50 caratteri',
                'title.min' => 'Il campo titolo deve avere almeno 5 caratteri',
                'thumb.required' => 'Il campo immagine è obbligatorio',
                'sale_date.required' => 'Il campo data è obbligatorio',
                'price.required' => 'Il campo prezzo è obbligatorio',
                'series.required' => 'Il campo serie è obbligatorio',
                'type.required' => 'Il campo tipo è obbligatorio',
                'description.min' => 'Il campo descrizione deve avere almeno 10 caratteri',
                'description.max' => 'Il campo descrizione non può avere più di 2000 caratteri',
            ]
        )->validate();

        return $validator;
    }
}
