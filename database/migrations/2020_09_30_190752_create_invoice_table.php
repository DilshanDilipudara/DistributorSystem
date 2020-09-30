<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('invoicenumber');
            $table->date('date');
            $table->unsignedBigInteger('shop_ID');
            $table->unsignedBigInteger('user_ID');
            $table->double('totalamount');
            $table->double('totaldiscount');
            $table->date('diliverdate');
            $table->double('cash');
            $table->double('check');
            $table->date('checkdate');
            $table->double('credit');
            $table->string('comment');
            $table->boolean('pending');
            $table->boolean('closed');
            $table->timestamps();

            $table->foreign('shop_ID')
                ->references('id')->on('shops')
                ->onUpdate('cascade');


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
        Schema::dropIfExists('invoices');
    }
}
