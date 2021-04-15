<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbSuratPanjarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('
            create table tb_surat_panjar(
                id_surat int auto_increment,
                no_surat int not null,
                bulan_surat int not null,
                tahun_surat int not null,
                nama varchar(256) not null,
                alamat varchar(256) not null,
                no_telp varchar(256) not null,
                no_perkara int not null,
                info_perkara char(5) not null,
                tahun_perkara int not null,
                sebagai varchar(256) not null,
                no_rekening varchar(256) null,
                nama_rekening varchar(256) null,
                cabang varchar(256) null,
                created_by int not null,
                created_at datetime not null,
                updated_by int,
                updated_at datetime,

                constraint pk_tb_surat_panjar_id_surat primary key(id_surat),

                constraint fk_tb_surat_panjar_created_by foreign key(created_by) references tb_user(id_user) on update cascade on delete restrict,
                constraint fk_tb_surat_panjar_updated_by foreign key(updated_by) references tb_user(id_user) on update cascade on delete restrict

            );
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('surat_panjar');
    }
}
