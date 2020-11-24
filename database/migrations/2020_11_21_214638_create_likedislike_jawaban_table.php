<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikedislikeJawabanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('likedislike_jawaban', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('jawaban_id')->nullable();
            $table->unsignedBigInteger('profile_id')->nullable();

            $table->foreign('jawaban_id')->references('id')->on('jawaban');
            $table->foreign('profile_id')->references('id')->on('profiles');
            $table->integer('poin');


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
        Schema::dropIfExists('likedislike_jawaban');
    }
}
