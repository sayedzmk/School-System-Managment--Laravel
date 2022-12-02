<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fees', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->decimal('amount',8,2);
            $table->unsignedBigInteger('shchoolgrade_id');
            $table->unsignedBigInteger('Classroom_id');
            $table->foreign('shchoolgrade_id')->references('id')->on('school_gardes')->onDelete('cascade');
            $table->foreign('Classroom_id')->references('id')->on('class_rooms')->onDelete('cascade');
            $table->string('year');
            $table->string('description')->nullable();
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
        Schema::dropIfExists('fees');
    }
}
