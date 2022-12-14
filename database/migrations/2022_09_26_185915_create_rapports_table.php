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
        //TODO verzin nieuwe scores voor het rapport
        Schema::create('rapports', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('description')->nullable();
            $table->integer('reaction_score');
            $table->integer('sharing_score');
            $table->integer('content_score');
            $table->unsignedInteger('crisis_id');
            $table->foreign('crisis_id')->references('id')->on('crises');
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
        Schema::dropIfExists('rapports');
    }
};
