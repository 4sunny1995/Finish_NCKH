<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Topics extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topics',function(Blueprint $table){
            $table->bigIncrements('id');
            $table->string('threadname');
            $table->integer('species');
            $table->integer('point');
            $table->string('describe')->nullable();
            $table->integer('userid');
            $table->integer('status');
            $table->date('dateOfAccept')->nullable();
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
        //
    }
}
