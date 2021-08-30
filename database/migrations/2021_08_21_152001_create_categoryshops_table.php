<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryshopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categoryshops', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(); 
            $table->string('slug')->nullable(); 

            $table->unsignedBigInteger('parent_id')->nullable();
            $table->foreign('parent_id')
                    ->references('id')
                    ->on('categoryshops')
                    ->onUpdate('CASCADE')
                    ->onDelete('CASCADE');
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
        Schema::dropIfExists('categorys');
    }
}
