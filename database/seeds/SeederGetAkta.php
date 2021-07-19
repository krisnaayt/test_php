<?php

use Illuminate\Database\Seeder;

class SeederGetAkta extends Seeder
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
            truncate tb_sms_get_akta_status;
        ");

        DB::statement("
            insert into tb_sms_get_akta_status(
                id_get_akta_status,
                status,
                badge
            )
            values
            ('1','Diinput', 'badge badge-secondary'),
            ('2','Waiting', 'badge badge-warning'),
            ('3','Akta Tersedia', 'badge badge-success'),
            ('4','Akta Cerai Sudah Diserahkan', 'badge badge-primary')
            ;
        ");
        
        $this->call(SetForeignKeyChecksOn::class);
    }
}
