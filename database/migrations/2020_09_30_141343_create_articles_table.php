<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('article_category_id');
            $table->unsignedBigInteger('metric_id');
            $table->string('name');
            $table->double('volume',15,8)->default(0.0);
            $table->double('buy_price',15,8)->default(0.0);
            $table->double('sell_price',15,8)->default(0.0);
            $table->double('min_sale_qty',15,8)->default(0.0);
            $table->boolean('buying')->default(0);
            $table->boolean('selling')->default(1);
            $table->boolean('isActive')->default(1);
            $table->string('comments')->nullable();
            $table->timestamps();

             $table->foreign('article_category_id')
                ->references('id')->on('article_categories')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->foreign('metric_id')
                ->references('id')->on('metrics')
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
        Schema::dropIfExists('articles');
    }
}
