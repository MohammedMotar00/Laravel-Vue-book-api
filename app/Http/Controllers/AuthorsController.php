<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;

use App\Models\Authors;

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
}