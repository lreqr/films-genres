<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFilmRequest;
use App\Http\Requests\UpdateFilmRequest;
use App\Models\Film;
use App\Models\FilmGenre;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class FilmController extends Controller
{
    public function index(Request $request): View
    {

        $films = Film::with('genres')->filterStatus($request['status'] ?? 'published')->get();

        return view('film.index', [
            'films' => $films,
        ]);
    }

    public function create()
    {
        $genres = Genre::all();
        return view('film.create',[
            'genres' => $genres,
        ]);
    }

    public function store(StoreFilmRequest $request)
    {
        $film = new Film();
        $film->title = $request['title'];

        if ($request->hasFile('poster')){
            $film->poster = '/storage/' . $request->file('poster')->store('films', 'public');
        }

        $film->save();

        foreach ($request['genres'] as $genre){
            $filmGenre = new FilmGenre();
            $filmGenre->film_id = $film->id;
            $filmGenre->genre_id = $genre;
            $filmGenre->save();
        }

        return redirect(route('film.index'));
    }

    public function publish($id)
    {
        $film = Film::find($id);
        $film->status = 'published';
        $film->update();

        return redirect(route('film.index'));
    }

    public function edit($id)
    {
        $film = Film::find($id);
        $genres = $film->genres()->get();

        return view('film.edit', [
            'film' => $film,
            'genres' => $genres,
        ]);

    }

    public function update(UpdateFilmRequest $request, $id)
    {
        $film = Film::find($id);
        $film->title = $request['title'];
        $film->status = $request['status'];

        if ($request->hasFile('poster')){
            $film->poster = '/storage/' . $request->file('poster')->store('films', 'public');
        }

        $film->update();

        return redirect(route('film.index'));
    }

    public function destroy($id)
    {
        Film::destroy($id);

        return redirect(route('film.index'));
    }
}
