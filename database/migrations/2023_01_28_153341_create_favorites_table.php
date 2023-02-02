<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favorites', function (Blueprint $table) {
//            $table->id();
//            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
//            $table->timestamps();
            $table->increments('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('vape_id');

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
        Schema::dropIfExists('favorites');
    }
};


//use Illuminate\Database\Migrations\Migration;
//use Illuminate\Database\Schema\Blueprint;
//use Illuminate\Support\Facades\Schema;
//
//return new class extends Migration {
//    /**
//     * Run the migrations.
//     *
//     * @return void
//     */
//    public function up()
//    {
//        Schema::create('favorite_vapes', function (Blueprint $table) {
//            $table->id();
//
//            $table->unsignedBigInteger('vape_id');
//            $table->foreign('vape_id')->references('id')->on('vapes')->cascadeOnDelete();
//
//            $table->unsignedBigInteger('favorite_id');
//            $table->foreign('favorite_id')->references('id')->on('favorites')->cascadeOnDelete();
//        });
//    }
//
//    /**
//     * Reverse the migrations.
//     *
//     * @return void
//     */
//    public function down()
//    {
//        Schema::dropIfExists('favorite_vapes');
//    }
//};

