<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_ID');
            $table->string('shopname');
            $table->string('ownername');
            $table->string('NIC')->unique();
            $table->string('email')->unique();
            $table->string('address');
            $table->string('city');
            $table->string('telephonemobile');
            $table->string('telephonebusiness');
            $table->string('businessIDnumber');
            $table->string('ownerphoto');
            $table->string('shopphoto');
            $table->boolean('cash')->default(0);
            $table->boolean('check')->default(0);
            $table->boolean('credit')->default(0);
            $table->boolean('approve')->default(0);
            $table->timestamps();

              $table->foreign('user_ID')
                ->references('id')->on('users')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shops');
    }
}
