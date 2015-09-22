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
            $table->increments('book_id');
            $table->string('name',75)->unique();
            $table->string('author', 75)->nullable();
            $table->string('isbn', 13)->nullable(); 
            $table->string('publisher', 75)->nullable();  
            $table->integer('edition')->nullable();  
            $table->string('faculty', 75)->nullable();  });
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
