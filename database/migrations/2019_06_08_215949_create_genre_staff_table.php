<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGenreStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('genre_staff', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->unsignedBigInteger('genre_id');
            $table
                ->foreign('genre_id')
                ->references('id')
                ->on('genres')
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
        Schema::dropIfExists('genre_staff');
    }
}
