<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function(Blueprint $table)
        {
            $table->increments('user_id');
            $table->string('first_name', 255);
            $table->string('last_name', 255);
            $table->binary('sex');
            $table->date('dob');
            $table->string('phone', 10);
            $table->string('street', 255);
            $table->string('suburb', 255);
            $table->string('city', 255);
            $table->string('postcode', 5);
            $table->string('state', 3);
            $table->string('password', 255);

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
        Schema::drop('users');
    }
}
