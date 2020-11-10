<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;

use App\Models\Authors;
use App\Models\AuthorsForBook;

class AuthorsController extends Controller
{
  public function index()
  {
    $authors = Authors::all();

    return response()->json($authors);
  }

  public function show($id)
  {
    $authors = Authors::findOrFail($id);
    return response()->json($authors);
  }

  public function authorsForBook($id)
  {
    // Get author_id that matches book_id
    $authorId = AuthorsForBook::where('book_id', $id)->get(['author_id']);

    // Get data from that matched author_id
    $authors = Authors::find($authorId);


    // return response()->json($authors);
    return response()->json($authors);
  }
}