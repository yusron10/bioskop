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
        Schema::table('ulasans', function (Blueprint $table) {
            $table->unsignedBigInteger('film_id')->after('id');
            $table->foreign('film_id')->references('id')->on('films')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ulasans', function (Blueprint $table) {
            $table->dropForeign(['film_id']);
            $table->dropColumn('film_id');
        });
    }
};
