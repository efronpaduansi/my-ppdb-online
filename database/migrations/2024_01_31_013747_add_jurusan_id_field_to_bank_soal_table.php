<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddJurusanIdFieldToBankSoalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bank_soal', function (Blueprint $table) {
            $table->unsignedBigInteger('jurusan_id')->default(1)->after('answer');

            // Table relation
            $table->foreign('jurusan_id')->references('id')->on('bank_soal')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bank_soal', function (Blueprint $table) {
            $table->dropColumn('jurusan_id');
            $table->dropForeign('jurusan_id');
        });
    }
}
