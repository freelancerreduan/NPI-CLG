<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name');
            $table->string('technology');
            $table->enum('simister', array('1st', '2nd', '3rd', '4th', '5th', '6th', '7th', '8th'));
            $table->string('title');
            $table->string('slug');
            $table->string('regulations');
            $table->string('published_by');
            $table->float('price');
            $table->string('thumbnail');
            $table->enum('status', array('pending', 'publish', 'rejected'))->default('pending');
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
        Schema::dropIfExists('books');
    }
}
