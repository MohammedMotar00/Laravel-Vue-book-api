<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GenresForBook extends Model
{
  use HasFactory;

  protected $table = 'books_genres';
  protected $fillable = ['book_id', 'genre_id'];
}