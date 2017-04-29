<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResumesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resumes',function (Blueprint $table) {
  $table->increments('id');
  $table->integer('user_id');
          $table->string('email')->nullable();
           $table->string('phone',10)->nullable();
           $table->string('name',50)->nullable();
           $table->string('city',50)->nullable();
           $table->string('college',150)->nullable();
           $table->date('cdate1')->nullable();
            $table->date('cdate2')->nullable();
              $table->string('cstream',150)->nullable();
              $table->float('cper', 4, 2)->nullable();
           $table->string('inter',150)->nullable();
             $table->date('idate1')->nullable();
               $table->date('idate2')->nullable();
                $table->string('istream',150)->nullable();
                $table->float('iper', 4, 2)->nullable();
           $table->string('school',150)->nullable(); 
               $table->date('sdate1')->nullable();
               $table->date('sdate2')->nullable();
                $table->string('sstream',150)->nullable();
                $table->float('sper', 4, 2)->nullable();
                   $table->string('skills',200)->nullable();
                   $table->longText('interests')->nullable();
                   $table->longText('work')->nullable();
                   $table->longText('languages')->nullable();




      
          
             $table->timestamps();});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::drop('resumes');
    }
}
