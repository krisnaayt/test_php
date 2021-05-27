<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddConstraintBerkasStatusInTbBerkasPerkaraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("SET FOREIGN_KEY_CHECKS = 0; ");

        DB::statement("
            alter table tb_berkas_perkara
            add constraint fk_tb_berkas_perkara_id_berkas_status foreign key (id_berkas_status) references tb_berkas_status(id_berkas_status) on update cascade on delete restrict
            ;
        ");
        
        DB::statement("SET FOREIGN_KEY_CHECKS = 1; ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("
            alter table tb_berkas_perkara
            drop constraint fk_tb_berkas_perkara_id_berkas_status
            ;
        ");
    }
}
