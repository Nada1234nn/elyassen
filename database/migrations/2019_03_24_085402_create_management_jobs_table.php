<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManagementJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('management_jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('job_title');
            $table->text('descr');
            $table->text('skills');
            $table->integer('employementorder_id')->unsigned();
            $table->foreign('employementorder_id')
                ->references('id')->on('employement_order')
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
        Schema::dropIfExists('management_jobs');
    }
}

