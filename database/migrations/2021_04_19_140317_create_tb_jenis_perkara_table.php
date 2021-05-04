<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbJenisPerkaraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            create table tb_jenis_perkara(
                id_jenis_perkara int,
                kode_jenis_perkara varchar(50) not null,
                jenis_perkara varchar(256) not null,

                constraint pk_tb_jenis_perkara_id_jenis_perkara primary key(id_jenis_perkara),
                constraint uq_tb_jenis_perkara_kode_jenis_perkara unique(kode_jenis_perkara)
            );
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jenis_perkara');
    }
}
