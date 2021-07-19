<?php

use Illuminate\Database\Seeder;

class SeederSendAkta extends Seeder
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
            truncate tb_sms_send_akta_status;
        ");

        DB::statement("
            insert into tb_sms_send_akta_status(
                id_send_akta_status,
                status,
                badge
            )
            values
            ('1','Waiting', 'badge badge-warning'),
            ('2','SMS Berhasil Terkirim', 'badge badge-success'),
            ('3','SMS Gagal Terkirim', 'badge badge-danger')
            ;
        ");
        
        $this->call(SetForeignKeyChecksOn::class);
    }
}
