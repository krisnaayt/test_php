<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbSmsAktaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            create table tb_sms_akta(
                id_sms_akta int auto_increment,
                id_perkara int not null, 
                no_perkara varchar(100) not null, 
                no_akta_cerai varchar(100), 
                created_by int not null,
                created_at datetime not null,
                updated_by int,
                updated_at datetime,
                id_get_akta_status int,
                last_sync_akta_at datetime,
                id_send_akta_status int,
                sms_send_at datetime,
                sms_text varchar(256),

                constraint pk_tb_sms_akta_id_sms_akta primary key (id_sms_akta),
                constraint uq_tb_sms_akta_id_perkara unique (id_perkara),
                constraint uq_tb_sms_akta_no_perkara unique (no_perkara),
                constraint fk_tb_sms_akta_created_by foreign key (created_by) references tb_user (id_user) on update cascade on delete restrict,
                constraint fk_tb_sms_akta_updated_by foreign key (updated_by) references tb_user (id_user) on update cascade on delete restrict,
                constraint fk_tb_sms_akta_id_get_akta_status foreign key (id_get_akta_status) references tb_sms_get_akta_status (id_get_akta_status) on update cascade on delete restrict,
                constraint fk_tb_sms_akta_id_send_akta_status foreign key (id_send_akta_status) references tb_sms_send_akta_status (id_send_akta_status) on update cascade on delete restrict
                
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
        Schema::dropIfExists('sms_akta');
    }
}
