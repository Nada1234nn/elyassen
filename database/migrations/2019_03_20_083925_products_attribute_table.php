<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProductsAttributeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::defaultStringLength(191);

        Schema::table('products_attribute', function (Blueprint $table) {
            //
            $table->increments('id');
            $table->string('attribute_value');
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')
                ->references('id')->on('products')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->integer('attribute_id')->unsigned();
            $table->foreign('attribute_id')
                ->references('id')->on('attributes')
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
        Schema::table('products_attribute', function (Blueprint $table) {
            //
        });
    }
}
