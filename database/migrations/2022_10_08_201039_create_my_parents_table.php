<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMyParentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_parents', function (Blueprint $table) {
            $table->id();
            $table->string('Email')->unique();
            $table->string('Password');

            //Fatherinformation
            $table->string('Name_Father');
            $table->string('National_ID_Father');
            $table->string('Passport_ID_Father');
            $table->string('Phone_Father');
            $table->string('Job_Father');
            $table->unsignedBigInteger('Nationality_Father_id');
            $table->unsignedBigInteger('Blood_Type_Father_id');
            $table->unsignedBigInteger('Religion_Father_id');
            $table->string('Address_Father');
            $table->foreign('Nationality_Father_id')->references('id')->on('nationalities') ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('Blood_Type_Father_id')->references('id')->on('type_bloods') ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('Religion_Father_id')->references('id')->on('religions') ->onUpdate('cascade')
            ->onDelete('cascade');
            //Mother information
            $table->string('Name_Mother');
            $table->string('National_ID_Mother');
            $table->string('Passport_ID_Mother');
            $table->string('Phone_Mother');
            $table->string('Job_Mother');
            $table->unsignedBigInteger('Nationality_Mother_id');
            $table->unsignedBigInteger('Blood_Type_Mother_id');
            $table->unsignedBigInteger('Religion_Mother_id');
            $table->string('Address_Mother');
            $table->foreign('Nationality_Mother_id')->references('id')->on('nationalities') ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('Blood_Type_Mother_id')->references('id')->on('type_bloods') ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('Religion_Mother_id')->references('id')->on('religions') ->onUpdate('cascade')
            ->onDelete('cascade');
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
        Schema::dropIfExists('my_parents');
    }
}
