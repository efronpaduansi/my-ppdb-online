<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJawabanSoalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jawaban_soal', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('soal_id');
            $table->integer('user_id');
            $table->string('answer');
            $table->enum('status', ['benar', 'salah']);
            $table->timestamps();

            //relation
            $table->foreign('soal_id')->references('id')->on('bank_soal')
            ->onUpdate('cascade')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jawaban_soal');
    }
}
