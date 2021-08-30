<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 80)->nullable();
            $table->string('lname', 80)->nullable();
            $table->string('nationalcode')->nullable();
            $table->boolean('nocode')->default(0);
            $table->string('phon')->nullable();
            $table->string('mobile', 13)->unique();
            $table->string('code', 4)->nullable();
            $table->string('code_expiration')->nullable();
            $table->boolean('active')->default(1);//state
            $table->string('password')->nullable();
            $table->string('roule')->default('user');
            $table->string('bio', 250)->nullable();
            $table->string('birthday')->nullable();
            $table->string('gender')->nullable();
            $table->string('city')->nullable();
            $table->string('username')->unique()->nullable();
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
