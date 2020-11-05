<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToAuthorsBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('authors_books', function (Blueprint $table) {
            $table->foreign('author_id', 'authors_books_author')->references('id')->on('authors')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('book_id', 'authors_books_book')->references('id')->on('books')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('authors_books', function (Blueprint $table) {
            $table->dropForeign('authors_books_author');
            $table->dropForeign('authors_books_book');
        });
    }
}
