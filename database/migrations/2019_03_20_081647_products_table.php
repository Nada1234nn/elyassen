<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::defaultStringLength(191);

        Schema::create('products', function (Blueprint $table) {
            //
            $table->increments('id');
            $table->string('name');
           $table->string('descr');
           $table->integer('sorting');
           $table->string('weight_product');
           $table->string('fill_product');
           $table->string('color_product');
           $table->integer('organic');
           $table->integer('free_sugar');
           $table->integer('free_lactose');
           $table->integer('under_expire');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')
                ->references('id')->on('categories')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->integer('supplier_id')->unsigned();
            $table->foreign('supplier_id')
                ->references('id')->on('suppliers')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::dropIfExists('products');

    }
}
