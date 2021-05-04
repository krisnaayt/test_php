<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropPerkaraColumnOnTbPerkaraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            alter table tb_perkara
            drop column no_perkara,
            drop column info_perkara,
            drop column tahun_perkara
            ;
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
            alter table tb_perkara
            add column no_perkara int not null after kode_berkas,
            add column info_perkara char(5) not null after no_perkara,
            add column tahun_perkara int not null after info_perkara
            ;
        ");
    }
}
