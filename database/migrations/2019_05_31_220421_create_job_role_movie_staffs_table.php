<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobRoleMovieStaffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_role_movie_staff', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->unsignedBigInteger('movie_id');
            $table
                ->foreign('movie_id')
                ->references('id')
                ->on('movies')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->unsignedBigInteger('job_role_id');
            $table
                ->foreign('job_role_id')
                ->references('id')
                ->on('job_roles')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->unsignedBigInteger('staff_id');
            $table
                ->foreign('staff_id')
                ->references('id')
                ->on('staff')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_role_movie_staff');
    }
}
