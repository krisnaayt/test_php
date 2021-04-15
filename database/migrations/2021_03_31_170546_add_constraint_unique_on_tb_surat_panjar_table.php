<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddConstraintUniqueOnTbSuratPanjarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('
            ALTER TABLE tb_surat_panjar ADD CONSTRAINT uq_tb_surat_panjar_no_surat UNIQUE (no_surat);
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('
            ALTER TABLE tb_surat_panjar DROP INDEX uq_tb_surat_panjar_no_surat;
        ');
    }
}
