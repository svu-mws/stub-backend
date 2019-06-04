<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('email', 40)->unique()->index();
            $table->string('password');
            $table->unsignedTinyInteger('num_children');
            $table->unsignedTinyInteger('num_bedrooms');
            $table->unsignedTinyInteger('num_bathrooms');
            $table->unsignedTinyInteger('num_cars');
            $table->unsignedTinyInteger('num_tvs');
            // relations
            $this->buildRelationships($table);
        });
    }

    public function buildRelationships(Blueprint $table)
    {
        $this->buildSingleRelationShips($table);
        $this->buildFrequenciesRelationships($table);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }

    private function buildSingleRelationShips(Blueprint $table)
    {
        $table->unsignedBigInteger('marital_status_id');
        $table
            ->foreign('marital_status_id')
            ->references('id')
            ->on('marital_statuses')
            ->onDelete('cascade')
            ->onUpdate('cascade');

        $table->unsignedBigInteger('education_level_id');
        $table
            ->foreign('education_level_id')
            ->references('id')
            ->on('education_levels')
            ->onDelete('cascade')
            ->onUpdate('cascade');

        $table->unsignedBigInteger('internet_connection_id');
        $table
            ->foreign('internet_connection_id')
            ->references('id')
            ->on('internet_connections')
            ->onDelete('cascade')
            ->onUpdate('cascade');

        $table->unsignedBigInteger('possession_type_id');
        $table
            ->foreign('possession_type_id')
            ->references('id')
            ->on('possession_types')
            ->onDelete('cascade')
            ->onUpdate('cascade');

        $table->unsignedBigInteger('movie_selector_id');
        $table
            ->foreign('movie_selector_id')
            ->references('id')
            ->on('movie_selectors')
            ->onDelete('cascade')
            ->onUpdate('cascade');

        $table->unsignedBigInteger('tv_signal_type_id');
        $table
            ->foreign('tv_signal_type_id')
            ->references('id')
            ->on('tv_signal_types')
            ->onDelete('cascade')
            ->onUpdate('cascade');

        $table->unsignedBigInteger('conveyor_format_id');
        $table
            ->foreign('conveyor_format_id')
            ->references('id')
            ->on('conveyor_formats')
            ->onDelete('cascade')
            ->onUpdate('cascade');
    }

    private function buildFrequenciesRelationships(Blueprint $table)
    {
        // PPV Freq
        $table->unsignedBigInteger('ppv_frequency_id');
        $table
            ->foreign('ppv_frequency_id')
            ->references('id')
            ->on('frequencies')
            ->onDelete('cascade')
            ->onUpdate('cascade');

        // Buying Freq
        $table->unsignedBigInteger('buying_frequency_id');
        $table
            ->foreign('buying_frequency_id')
            ->references('id')
            ->on('frequencies')
            ->onDelete('cascade')
            ->onUpdate('cascade');

        // Renting Freq
        $table->unsignedBigInteger('renting_frequency_id');
        $table
            ->foreign('renting_frequency_id')
            ->references('id')
            ->on('frequencies')
            ->onDelete('cascade')
            ->onUpdate('cascade');

        // Viewing Freq
        $table->unsignedBigInteger('viewing_frequency_id');
        $table
            ->foreign('viewing_frequency_id')
            ->references('id')
            ->on('frequencies')
            ->onDelete('cascade')
            ->onUpdate('cascade');

        // Theatre Freq
        $table->unsignedBigInteger('theatre_frequency_id');
        $table
            ->foreign('theatre_frequency_id')
            ->references('id')
            ->on('frequencies')
            ->onDelete('cascade')
            ->onUpdate('cascade');

        // TV Movie Freq
        $table->unsignedBigInteger('tv_movie_frequency_id');
        $table
            ->foreign('tv_movie_frequency_id')
            ->references('id')
            ->on('frequencies')
            ->onDelete('cascade')
            ->onUpdate('cascade');
    }
}
