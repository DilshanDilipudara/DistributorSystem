<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicelineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoicelines', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('invoice_id');
            $table->date('date');
            $table->unsignedBigInteger('artical_id');
            $table->double('unitprice');
            $table->double('saleqty');
            $table->double('linediscount');
            $table->double('freeoffer');
            $table->double('linetotal');
            $table->timestamps();

             $table->foreign('invoice_id')
                ->references('id')->on('invoices')
                ->onUpdate('cascade');
            
            $table->foreign('artical_id')
                ->references('id')->on('articals')
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
        Schema::dropIfExists('invoicelines');
    }
}
