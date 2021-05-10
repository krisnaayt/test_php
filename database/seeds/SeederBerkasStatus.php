<?php

use Illuminate\Database\Seeder;

class SeederBerkasStatus extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::statement("
        //     delete from tb_berkas_status;
        // ");
        
        DB::statement("
            insert ignore into tb_berkas_status(
                id_berkas_status,
                berkas_status,
                badge
            )
            values
            ('1', 'Menunggu', 'badge badge-info'),
            ('2', 'Diterima', 'badge badge-success'),
            ('3', 'Ditolak', 'badge badge-danger'),
            ('4', 'BHT', 'badge badge-primary')
            ;
        ");
    }
}
