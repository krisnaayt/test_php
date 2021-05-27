<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbGrupJenisPerkaraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            create table tb_grup_jenis_perkara(
                id_grup_jenis_perkara int,
                grup_jenis_perkara varchar(50) not null,
                nama_grup_jenis_perkara varchar(256) not null,

                constraint pk_tb_grup_jenis_perkara_id_grup_jenis_perkara primary key (id_grup_jenis_perkara),
                constraint uq_tb_grup_jenis_perkara_grup_jenis_perkara unique(grup_jenis_perkara)
            )
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grup_jenis_perkara');
    }
}
