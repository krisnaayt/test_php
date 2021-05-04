<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbPerkaraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            create table tb_perkara(
                id_perkara int auto_increment,
                kode_berkas varchar(50) not null,
                no_perkara int not null,
                info_perkara char(5) not null,
                tahun_perkara int not null,
                id_jenis_perkara int not null,
                tgl_putus date not null,
                tgl_minutasi date not null,
                tgl_bht date null,
                
                constraint pk_tb_perkara_id_perkara primary key (id_perkara),
                constraint fk_tb_perkara_kode_berkas foreign key (kode_berkas) references tb_berkas_perkara(kode_berkas) on update cascade on delete restrict

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
        Schema::dropIfExists('perkara');
    }
}
