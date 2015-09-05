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
        Schema::create('books', function(Blueprint $table) {
            $table->increments('book_id');
            $table->string('name')->unique();
            $table->string('author')->unique();
            $table->string('isbn')->unique();
            $table->string('publisher')->unique();
            $table->integer('edition')->unique();
            $table->string('faculty')->unique();
            $table->timestamps();
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
