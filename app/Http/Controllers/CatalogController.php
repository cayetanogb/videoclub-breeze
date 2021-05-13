<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class CatalogController extends Controller
{

    public function getIndex()
    {
        return view('catalog.index', ['arrayPeliculas' => Movie::all()]);
    }

    public function getShow($id)
    {
        return view('catalog.show', ['pelicula' => Movie::findOrFail($id), 'id' => $id]);
    }

    public function getCreate()
    {
        return view('catalog.create');
    }

    public function getEdit($id)
    {
        return view('catalog.edit', ['pelicula' => Movie::findOrFail($id), 'id' => $id]);
    }

    public function postCreate(Request $request)
    {
        $pelicula = new Movie;

        $pelicula->title = $request->input('title');
        $pelicula->year = $request->input('year');
        $pelicula->director = $request->input('director');
        $pelicula->poster = $request->input('poster');
        $pelicula->synopsis = $request->input('synopsis');

        $pelicula->save();

        return redirect()->route('index');
    }

    public function putEdit(Request $request, $id)
    {
        $pelicula = Movie::findOrFail($id);

        $pelicula->title = $request->input('title');
        $pelicula->year = $request->input('year');
        $pelicula->director = $request->input('director');
        $pelicula->poster = $request->input('poster');
        $pelicula->synopsis = $request->input('synopsis');

        $pelicula->save();

        return redirect()->route('index');
    }
}
