<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleCategorySupplierTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_category_supplier', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('article_category_id');
            $table->unsignedBigInteger('supplier_id');
            $table->timestamps();

            $table->foreign('article_category_id')
                ->references('id')->on('article_categories')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->foreign('supplier_id')
                ->references('id')->on('suppliers')
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
        Schema::dropIfExists('article_category_supplier');
    }
}
