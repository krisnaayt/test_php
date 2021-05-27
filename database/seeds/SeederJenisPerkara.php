<?php

use Illuminate\Database\Seeder;

class SeederJenisPerkara extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SetForeignKeyChecksOff::class);

        DB::statement("
            truncate tb_jenis_perkara;
        ");

        DB::statement("
            insert into tb_jenis_perkara(
                id_jenis_perkara,
                kode_jenis_perkara,
                jenis_perkara,
                grup_jenis_perkara
            )
            values
            ('1','CG','Cerai Gugat', 'G'),
            ('2','CT','Cerai Talak', 'G'),
            ('3','GHB','Gugat Harta Bersama', 'G'),
            ('4','GW','Gugat Waris', 'G'),
            ('5','IN cont','Pengesahan\/Itsbat Nikah (Contensius)', 'G'),
            ('6','Hadhanah','Hadhanah (Hak Asuh Anak)', 'G'),
            ('7','Hibah','Hibah', 'G'),
            ('8','IN','Pengesahan\/Itsbat Nikah', 'P'),
            ('9','DN','Dispensasi Nikah', 'P'),
            ('10','AUA','Asal Usul Anak ', 'P'),
            ('11','PAW','Penetapan Ahli Waris', 'P'),
            ('12','PA','Pengangkatan Anak', 'P'),
            ('13','WA','Wali Adhol', 'P'),
            ('14','Perwalian','Perwalian', 'P')

            ;
        ");
        
        $this->call(SetForeignKeyChecksOn::class);
    }
}
