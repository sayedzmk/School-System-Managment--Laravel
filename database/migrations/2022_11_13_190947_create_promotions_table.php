<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('from_shchoolgrade');
            $table->unsignedBigInteger('from_Classroom');
            $table->unsignedBigInteger('from_section');
            $table->unsignedBigInteger('to_shchoolgrade');
            $table->unsignedBigInteger('to_Classroom');
            $table->unsignedBigInteger('to_section');
            $table->string('academic_year');
            $table->string('academic_year_new');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('from_shchoolgrade')->references('id')->on('school_gardes')->onDelete('cascade');
            $table->foreign('from_Classroom')->references('id')->on('class_rooms')->onDelete('cascade');
            $table->foreign('from_section')->references('id')->on('sections')->onDelete('cascade');
            $table->foreign('to_shchoolgrade')->references('id')->on('school_gardes')->onDelete('cascade');
            $table->foreign('to_Classroom')->references('id')->on('class_rooms')->onDelete('cascade');
            $table->foreign('to_section')->references('id')->on('sections')->onDelete('cascade');
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
        Schema::dropIfExists('promotions');
    }
}
