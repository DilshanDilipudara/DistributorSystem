<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->string('description')->nullable();
            $table->unsignedBigInteger('expense_type_id');
            $table->unsignedBigInteger('vehicle_type_id')->nullable();
            $table->integer('cost')->nullable();
            $table->string('comment')->nullable();
            $table->boolean('isTransport')->default(0);

            $table->foreign('expense_type_id')
                ->references('id')->on('expense_types')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->foreign('vehicle_type_id')
                ->references('id')->on('vehicle_types')
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
        Schema::dropIfExists('expenses');
    }
}
