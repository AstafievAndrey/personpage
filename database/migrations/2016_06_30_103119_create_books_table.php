<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id')->comment('Ид записи для ORM');
            $table->string('updated_at')->nullable()->comment('Когда редактировали');
            $table->string('created_at')->comment('Когда создали');
            $table->string('name',400)->nullable()->comment('Название книги');
            $table->string('text',1000)->nullable()->comment('Описание или аннотация к книге');
            $table->string('title',1000)->nullable()->comment('Для тега <title>');
            $table->string('desc',3000)->nullable()->comment('Для тега <meta description>');
            $table->string('keywords',3000)->nullable()->comment('Для тега <meta keywords>');
            $table->string('translit',1000)->nullable()->comment('Translit для Url');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('books');
    }
}
