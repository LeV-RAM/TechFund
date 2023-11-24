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
        Schema::create('project', function (Blueprint $table) {
            $table->id('projectID')->unique();
            $table->unsignedBigInteger('ownerID');
            $table->foreign('ownerID')->references('peopleID')->on('people')->onDelete('cascade');
            $table->string('projectname');
            $table->decimal('fund',12,2);
            $table->date('deadline');
            $table->boolean('needworker'); //klo butuh worker ini TRUE klo kga jd FALSE 

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project');
    }
};
