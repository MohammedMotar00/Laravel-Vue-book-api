<?php

namespace App\Http\Controllers;

use App\Models\Genres;
use App\Models\BooksGenres;

// use Illuminate\Http\Request;

class GenresController extends Controller
{
  public function index()
  {
    $genres = Genres::all();
    return response()->json($genres);
  }

  public function show($id)
  {
    $genres = Genres::findOrFail($id);
    return response()->json($genres);
  }

  public function genresForBook($id)
  {
    $genreId = BooksGenres::where('book_id', $id)->get(['genre_id']);

    $genres = Genres::find($genreId);

    return response()->json($genres);
  }
}