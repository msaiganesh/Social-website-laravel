<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users',function (Blueprint $table) {
  $table->increments('id');
          $table->string('email');
           $table->string('username');
             $table->string('password'); $table->string('firstname')->nullable();
             $table->string('lastname')->nullable();
             $table->string('location')->nullable();
             $table->string('remember_token')->nullable();
             $table->timestamps();});
    
    }
    public function down()
    {
        Schema::drop('users');
    }
}
