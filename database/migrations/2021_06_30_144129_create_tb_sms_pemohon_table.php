<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbSmsPemohonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            create table tb_sms_pemohon(
                id_sms_pemohon int auto_increment,
                id_sms_akta int not null,
                nama varchar(3000) not null,
                no_hp varchar(20) not null,
                tgl_penyerahan_akta date,

                constraint pk_tb_sms_pemohon_id_sms_pemohon primary key (id_sms_pemohon),
                constraint fk_tb_sms_pemohon_id_sms_akta foreign key (id_sms_akta) references tb_sms_akta (id_sms_akta) on update cascade on delete cascade
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
        Schema::dropIfExists('sms_pemohon');
    }
}
