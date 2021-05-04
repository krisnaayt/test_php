<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbBerkasPerkaraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            create table tb_berkas_perkara(
                id_berkas int auto_increment,
                kode_berkas varchar(50) not null,
                tgl_penyerahan date not null,
                id_berkas_status int null,
                ket_status varchar(256) null,
                created_by int not null,
                created_at datetime not null,
                updated_by int null,
                updated_at datetime null,

                constraint pk_tb_berkas_id_berkas primary key(id_berkas),
                constraint uq_tb_berkas_kode_berkas unique (kode_berkas),
                constraint fk_tb_berkas_created_by foreign key (created_by) references tb_user(id_user) on update cascade on delete restrict,
                constraint fk_tb_berkas_updated_by foreign key (updated_by) references tb_user(id_user) on update cascade on delete restrict

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
        Schema::dropIfExists('berkas_perkara');
    }
}
