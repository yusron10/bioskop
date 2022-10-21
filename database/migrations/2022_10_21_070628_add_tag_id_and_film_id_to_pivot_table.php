<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pivot', function (Blueprint $table) {
            $table->unsignedBigInteger('tag_id')->after('id');
            $table->unsignedBigInteger('film_id')->after('id');
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('restrict');
            $table->foreign('film_id')->references('id')->on('films')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pivot', function (Blueprint $table) {
            //
        });
    }
};
