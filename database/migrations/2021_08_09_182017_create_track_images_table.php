<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrackImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('track_images', function (Blueprint $table) {
            $table->id();
            $table->string('path');
            $table->string('title')->nullable();
            $table->string('alt')->nullable();
            $table->timestamps();

            $table->bigInteger('track_id')->unsigned(); 
            $table->foreign('track_id')->references('id')->on('tracks')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('track_images');
    }
}
