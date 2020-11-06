<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;

use App\Models\Books;

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
}