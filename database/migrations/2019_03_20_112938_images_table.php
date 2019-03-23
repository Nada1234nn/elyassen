<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::defaultStringLength(191);

        Schema::table('images', function (Blueprint $table) {
            //
            $table->increments('id');
            $table->string('title');
            $table->string('descr');
            $table->string('image');
            $table->integer('type');

            $table->integer('product_id')->unsigned()->nullable();
            $table->foreign('product_id')
                ->references('id')->on('products')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->integer('news_id')->unsigned()->nullable();
            $table->foreign('news_id')
                ->references('id')->on('news')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->integer('locationCompany_id')->unsigned()->nullable();
            $table->foreign('locationCompany_id')
                ->references('id')->on('locations_company')
                ->onDelete('cascade')
                ->onUpdate('cascade');

               $table->integer('staticPage_id')->unsigned()->nullable();
            $table->foreign('staticPage_id')
                ->references('id')->on('staticpage')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->integer('consultionOrder_id')->unsigned()->nullable();
            $table->foreign('consultionOrder_id')
                ->references('id')->on('consultion_order')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->integer('imagesVideos_id')->unsigned()->nullable();
            $table->foreign('imagesVideos_id')
                ->references('id')->on('images_videos')
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
        Schema::table('images', function (Blueprint $table) {
            //
        });
    }
}
