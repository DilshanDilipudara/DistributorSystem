<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
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
            $table->string('number');
            $table->date('date')->nullable();
            $table->unsignedBigInteger('shop_id');
            $table->unsignedBigInteger('user_id');
            $table->double('total')->default(0.0);
            $table->double('discount')->default(0.0);
            $table->date('deliver_date')->nullable();
            $table->double('cash')->default(0.0);
            $table->double('cheque')->default(0.0);
            $table->date('cheque_date')->nullable();
            $table->boolean('credit')->default(0);
            $table->string('comment')->nullable();
            $table->boolean('pending')->default(0);
            $table->boolean('closed')->default(1);
            $table->boolean('isActive')->default(1);
            $table->timestamps();

            $table->foreign('shop_id')
                ->references('id')->on('shops')
                ->onUpdate('cascade')
                ->onDelete('restrict');


            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onUpdate('cascade')
                ->onDelete('restrict');;
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
