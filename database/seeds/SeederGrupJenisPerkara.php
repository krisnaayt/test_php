<?php

use Illuminate\Database\Seeder;

class SeederGrupJenisPerkara extends Seeder
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
            truncate tb_grup_jenis_perkara;
        ");
        
        DB::statement("
            insert into tb_grup_jenis_perkara(
                id_grup_jenis_perkara,
                grup_jenis_perkara,
                nama_grup_jenis_perkara
            )
            values
            ('1', 'G', 'Gugatan'),
            ('2', 'P', 'Permohonan')
            ;
        ");
        
        $this->call(SetForeignKeyChecksOn::class);
    }
}
