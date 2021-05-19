<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnArsipOnTbBerkasPerkaraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            alter table tb_berkas_perkara 
            add column set_arsip_by int null,
            add column set_arsip_at datetime null
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("
            alter table tb_berkas_perkara
            drop column set_arsip_by,
            drop column set_arsip_at
        ");
    }
}
