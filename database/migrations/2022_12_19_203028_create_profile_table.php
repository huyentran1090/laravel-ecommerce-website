<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile', function (Blueprint $table) {
            $table->increments('id');
            $table->string('full_name');
            $table->string('image');
            $table->date('date_of_birth');
            $table->tinyInteger('gender');
            $table->string('phone_number', 20)->nullable();
            $table->string('address');
            $table->string('social_network');
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')
            ->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profile');
    }
}
