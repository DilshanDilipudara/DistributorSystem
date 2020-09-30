<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupplerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('articalcategory_id');
            $table->string('name');
            $table->string('street');
            $table->string('city');
            $table->string('telephone')->unique();;
            $table->string('mobilenumber')->unique();;
            $table->string('email');
            $table->string('regno');
            $table->string('comments');
            $table->timestamps();

             $table->foreign('articalcategory_id')
                ->references('id')->on('articalcategories')
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
        Schema::dropIfExists('supplers');
    }
}
