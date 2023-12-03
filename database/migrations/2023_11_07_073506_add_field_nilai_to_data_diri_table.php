<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldNilaiToDataDiriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('data_diri', function (Blueprint $table) {
            $table->string('nilai_ujian')->default('0')->after('hobi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('data_diri', function (Blueprint $table) {
            $table->dropColumn('nilai_ujian');
        });
    }
}
