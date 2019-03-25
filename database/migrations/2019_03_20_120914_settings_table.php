<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::defaultStringLength(191);

        Schema::create('settings', function (Blueprint $table) {
            //
            $table->increments('id');
            $table->string('title');
            $table->string('logo_image');
            $table->string('address');
            $table->string('phone');
            $table->string('email');
            $table->string('logo_footer');
            $table->string('copy_rights');
            $table->text('descr');
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
        Schema::dropIfExists('settings');

    }
}
