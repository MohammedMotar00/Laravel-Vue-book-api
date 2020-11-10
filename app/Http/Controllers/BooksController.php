<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;

use App\Models\AuthorsBook;
use App\Models\Books;
use App\Models\BooksGenres;

class BooksController extends Controller
{
  public function index()
  {
    $books = Books::all();

    return response()->json($books);
  }

  public function show($id)
  {
    $books = Books::findOrFail($id);
    return response()->json($books);
  }

  public function booksForAuthor($id)
  {
    $bookId = AuthorsBook::where('author_id', $id)->get(['book_id']);

    $books = Books::find($bookId);

    return response()->json($books);
  }

  public function booksForGenres($id)
  {
    $bookId = BooksGenres::where('genre_id', $id)->get(['book_id']);

    $books = Books::find($bookId);

    return response()->json($books);
  }
}