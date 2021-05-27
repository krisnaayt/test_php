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
        $this->call(SetForeignKeyChecksOff::class);

        DB::statement("
            truncate tb_berkas_status;
        ");
        
        DB::statement("
            insert into tb_berkas_status(
                id_berkas_status,
                berkas_status,
                badge,
                color,
                fa_icon
            )
            values
            ('1', 'Diajukan', 'badge badge-info', 'info', 'fa fa-share'),
            ('2', 'Diterima', 'badge badge-success', 'success', 'fa fa-check-circle'),
            ('3', 'Ditolak', 'badge badge-danger', 'danger', 'fa fa-times-circle'),
            ('4', 'BHT', 'badge badge-primary', 'primary', 'fa fa-gavel'),
            ('5', 'Diarsipkan', 'badge badge-dark', 'dark', 'fa fa-bookmark')
            ;
        ");
        
        $this->call(SetForeignKeyChecksOn::class);
    }
}
