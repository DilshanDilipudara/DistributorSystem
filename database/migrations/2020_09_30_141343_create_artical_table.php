<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('articalcategory_id');
            $table->string('name');
            $table->double('volume',15,8);
            $table->double('buyprice',15,8);
            $table->double('sellprice',15,8);
            $table->double('minsaleqty',15,8);
            $table->boolean('buying');
            $table->boolean('selling');
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
        Schema::dropIfExists('articals');
    }
}
