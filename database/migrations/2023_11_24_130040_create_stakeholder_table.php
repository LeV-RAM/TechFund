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
        Schema::create('stakeholder', function (Blueprint $table) {
            $table->unsignedBigInteger('projectID');
            $table->foreign('projectID')->references('projectID')->on('project')->onDelete('cascade');
            $table->unsignedBigInteger('stakeholderID');
            $table->foreign('stakeholderID')->references('peopleID')->on('people')->onDelete('cascade');
            $table->decimal('amount');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stakeholder');
    }
};
