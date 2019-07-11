<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Author', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nickname');
            $table->string('mail');
            $table->string('password');
        });

        Schema::create('MyBlog', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('title');
            $table->longText('content');
            $table->integer('author');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('Author');
        // Schema::dropIfExists('MyBlog');
    }
}
