<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbNotifTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            create table tb_notif_berkas(
                id_notif_berkas int auto_increment,
                kode_berkas varchar(50) not null,
                id_berkas_status int not null,
                send_to_user int not null,
                created_by int not null,
                created_at datetime not null,
                
                constraint pk_tb_notif_berkas_id_notif_berkas primary key (id_notif_berkas),
                constraint fk_tb_notif_berkas_kode_berkas foreign key (kode_berkas) references tb_berkas_perkara (kode_berkas) on update cascade on delete cascade,
                constraint fk_tb_notif_berkas_id_berkas_status foreign key (id_berkas_status) references tb_berkas_status (id_berkas_status) on update cascade on delete cascade,
                constraint fk_tb_notif_berkas_send_to_user foreign key (send_to_user) references tb_user(id_user) on update cascade on delete cascade,
                constraint fk_tb_notif_berkas_created_by foreign key (created_by) references tb_user(id_user) on update cascade on delete cascade
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
        Schema::dropIfExists('notif_berkas');
    }
}
