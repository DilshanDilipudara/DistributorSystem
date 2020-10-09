<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopsTable extends Migration
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
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->string('owner_name');
            $table->string('nic')->unique()->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('tel_mobile')->nullable();
            $table->string('tel_business')->nullable();
            $table->string('business_id_num')->nullable();
            $table->string('photo')->nullable();
            $table->string('owner_photo')->nullable();
            $table->boolean('cash')->default(0);
            $table->boolean('cheque')->default(0);
            $table->boolean('credit')->default(0);
            $table->boolean('approved')->default(0);
            $table->boolean('isActive')->default(0);
            $table->timestamps();

              $table->foreign('user_id')
                ->references('id')->on('users')
                ->onUpdate('cascade')
                ->onDelete('restrict');
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
