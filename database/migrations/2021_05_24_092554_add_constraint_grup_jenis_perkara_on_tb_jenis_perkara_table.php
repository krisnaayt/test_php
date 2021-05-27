<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddConstraintGrupJenisPerkaraOnTbJenisPerkaraTable extends Migration
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
            alter table tb_jenis_perkara
            add constraint fk_tb_jenis_perkara_grup_jenis_perkara foreign key (grup_jenis_perkara) references tb_grup_jenis_perkara(grup_jenis_perkara) on update cascade on delete restrict
            ;
        ");

        DB::statement("
            alter table tb_berkas_perkara
            add constraint fk_tb_berkas_perkara_grup_jenis_perkara foreign key (grup_jenis_perkara) references tb_grup_jenis_perkara(grup_jenis_perkara) on update cascade on delete restrict
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
            alter table tb_jenis_perkara
            drop constraint fk_tb_jenis_perkara_grup_jenis_perkara
            ;
        ");

        DB::statement("
            alter table tb_berkas_perkara
            drop constraint fk_tb_berkas_perkara_grup_jenis_perkara
            ;
        ");
    }
}
