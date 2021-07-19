<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbSmsSendAktaLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       DB::statement("
            create table tb_sms_send_akta_log(
                id_send_akta_log int auto_increment,
                id_perkara_processed text,
                id_perkara_send text,
                created_at datetime not null,

                constraint pk_tb_sms_send_akta_logid_send_akta_log primary key (id_send_akta_log)
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
        Schema::dropIfExists('sms_send_akta_log');
    }
}
