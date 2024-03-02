<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Film;
use App\Models\Genre;
use Illuminate\Http\Request;
use App\Traits\PaginationTrait;


class GenreController extends Controller
{
    use PaginationTrait;

    public function index()
    {
        $genres = Genre::all();
        return response()->json($genres);
    }

    public function films(Request $request, $id)
    {
        $paginate = 10;
        $perPage = 5;
        try {
            $films = Genre::find($id)->films->toArray();
            if (!is_null($request['page'])){
                $films = $this->paginate($films, $perPage,$request['page'] ?? $paginate);
            }
            return response()->json($films);
        } catch (\Exception $exception){
            return response()->json([
                'message' => $exception->getMessage(),
            ]);
        }




    }
}
