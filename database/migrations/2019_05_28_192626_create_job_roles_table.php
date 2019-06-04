<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobRolesTable extends Migration
{
    public function up()
    {
        Schema::create('job_roles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('title', 30)->unique()->index();
        });
    }

    public function down()
    {
        Schema::dropIfExists('job_roles');
    }
}
