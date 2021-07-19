<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbSmsGetAktaLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            create table tb_sms_get_akta_log(
                id_get_akta_log int auto_increment,
                id_perkara_processed text,
                id_perkara_get text,
                created_at datetime not null,

                constraint pk_tb_sms_get_akta_log_id_get_akta_log primary key (id_get_akta_log)
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
        Schema::dropIfExists('sms_get_akta_log');
    }
}
