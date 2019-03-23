<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::defaultStringLength(191);

        Schema::table('attributes', function (Blueprint $table) {
            //
            $table->increments('id');
            $table->string('name');
            $table->integer('group_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')
                ->references('id')->on('categories')
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
        Schema::table('attributes', function (Blueprint $table) {
            //
        });
    }
}
