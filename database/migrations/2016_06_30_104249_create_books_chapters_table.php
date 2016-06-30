<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksChaptersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books_chapters', function (Blueprint $table) {
            $table->increments('id')->comment('Ид записи для ORM');
            $table->string('updated_at')->nullable()->comment('Когда редактировали');
            $table->string('created_at')->comment('Когда создали');
            $table->integer('book_id')->comment('Ид книги');
            $table->integer('chapter_id')->comment('Ид главы');
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
            $table->foreign('chapter_id')->references('id')->on('chapters')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('books_chapters');
    }
}
