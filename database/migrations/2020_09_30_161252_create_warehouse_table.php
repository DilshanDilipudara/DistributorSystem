<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWarehouseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warehouse', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('articalcategory_id');
            $table->unsignedBigInteger('artical_id');
            $table->unsignedBigInteger('suppler_id');
            $table->date('date');
            $table->string('ordernumber');
            $table->string('invoicenumber');
            $table->double('totalprice',15,8);
            $table->double('quantity',15,8);
            $table->string('comment');
            $table->boolean('buying');
            $table->boolean('selling');
            $table->timestamps();
            
            $table->foreign('articalcategory_id')
                ->references('id')->on('articalcategories')
                ->onUpdate('cascade');

            $table->foreign('artical_id')
                ->references('id')->on('articals')
                ->onUpdate('cascade');  
                
            $table->foreign('suppler_id')
                ->references('id')->on('supplers')
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
        Schema::dropIfExists('warehouse');
    }
}
