<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToBooksGenresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('books_genres', function (Blueprint $table) {
            $table->foreign('book_id', 'books_genres_book')->references('id')->on('books')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('genre_id', 'books_genres_genre')->references('id')->on('genres')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('books_genres', function (Blueprint $table) {
            $table->dropForeign('books_genres_book');
            $table->dropForeign('books_genres_genre');
        });
    }
}
