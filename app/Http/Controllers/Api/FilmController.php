<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Film;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    public function index(Request $request)
    {
        $paginate = 10;
        $films = Film::with('genres')->paginate($request['page'] ?? $paginate);
        return response()->json($films);
    }

    public function show($id)
    {
        $film = Film::where('id', $id)->with('genres')->get()->all();

        if (!empty($film)){
            return response()->json($film);
        } else {
            return response()->json([
                'message' => 'Film not found'
            ]);
        }

    }
}
