<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleInvoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_invoice', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('invoice_id');
            $table->unsignedBigInteger('article_id');
            $table->date('date')->nullable();
            $table->double('unit_price')->default(0.0);
            $table->double('sale_qty')->default(0.0);
            $table->double('discount')->default(0.0);
            $table->double('free_offer')->default(0.0);
            $table->double('total')->default(0.0);
            $table->timestamps();

             $table->foreign('invoice_id')
                ->references('id')->on('invoices')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->foreign('article_id')
                ->references('id')->on('articles')
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
        Schema::dropIfExists('article_invoice');
    }
}
