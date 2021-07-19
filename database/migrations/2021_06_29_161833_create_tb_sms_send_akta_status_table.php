<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbSmsSendAktaStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            create table tb_sms_send_akta_status(
                id_send_akta_status int,
                status varchar(100) not null,
                badge varchar(256),

                constraint pk_tb_sms_send_akta_status_id_send_akta_status primary key (id_send_akta_status)
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
        Schema::dropIfExists('sms_send_akta_status');
    }
}
