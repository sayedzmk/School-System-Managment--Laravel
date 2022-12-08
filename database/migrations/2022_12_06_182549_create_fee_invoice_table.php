<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeeInvoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fee_invoice', function (Blueprint $table) {
            $table->id();
            $table->date('invoice_date');
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('shchoolgrade_id');
            $table->unsignedBigInteger('Classroom_id');
            $table->unsignedBigInteger('fee_id');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('shchoolgrade_id')->references('id')->on('school_gardes')->onDelete('cascade');
            $table->foreign('Classroom_id')->references('id')->on('class_rooms')->onDelete('cascade');
            $table->foreign('fee_id')->references('id')->on('fees')->onDelete('cascade');
            $table->decimal('amount',8,2);
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
        Schema::dropIfExists('fee_invoice');
    }
}
