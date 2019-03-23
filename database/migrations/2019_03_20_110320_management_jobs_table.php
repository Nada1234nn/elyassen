<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ManagementJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::defaultStringLength(191);

        Schema::table('management_jobs', function (Blueprint $table) {
            //
            $table->increments('id');
            $table->string('job_title');
            $table->text('descr');
            $table->text('skills');
            $table->integer('employementorder_id')->unsigned();
            $table->foreign('employementorder_id')
                ->references('id')->on('employement_orders')
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
        Schema::table('management_jobs', function (Blueprint $table) {
            //
        });
    }
}
