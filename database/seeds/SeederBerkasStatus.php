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
            ('0', 'Waiting', 'badge badge-info'),
            ('1', 'Approve', 'badge badge-success'),
            ('2', 'Reject', 'badge badge-danger')
            ;
        ");
    }
}
