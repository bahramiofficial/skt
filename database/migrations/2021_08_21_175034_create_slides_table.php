<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slides', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('text')->nullable();
            $table->string('image')->nullable();


            $table->bigInteger('brand_id')->unsigned();
            $table->foreign('brand_id')->references('id')
                ->on('brands')->onUpdate('cascade')->onDelete('cascade');

            $table->bigInteger('categoryshop_id')->unsigned();
            $table->foreign('categoryshop_id')->references('id')
                ->on('categoryshops')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('slides');
    }
}
