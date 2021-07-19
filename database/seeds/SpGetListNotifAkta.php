<?php

use Illuminate\Database\Seeder;

class SpGetListNotifAkta extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::unprepared("DROP PROCEDURE IF EXISTS get_list_notif_akta;");
        
        DB::unprepared("CREATE PROCEDURE get_list_notif_akta(
            in id_sms_akta_ int 
        )
        begin
            select
            tsa.id_sms_akta,
            tsa.id_perkara, 
            tsa.no_perkara,
            tsa.no_akta_cerai,
            tsp.nama as nama_pemohon,
            tsp.no_hp as no_hp_pemohon,
            tst.nama as nama_termohon,
            tst.no_hp as no_hp_termohon,
            date_format(tsa.created_at, '%d-%m-%Y %H:%i') as created_at,
            date_format(tsa.updated_at , '%d-%m-%Y %H:%i') as updated_at,
            date_format(tsa.last_sync_akta_at, '%d-%m-%Y %H:%i') as last_sync_akta_at,
            date_format(tsa.sms_send_at, '%d-%m-%Y %H:%i') as sms_send_at,
            tsa.sms_text,
            tsgas.id_get_akta_status,
            tsgas.status as get_akta_status,
            tsgas.badge as badge_get_akta_status,
            tssas.id_send_akta_status,
            tssas.status as send_akta_status,
            tssas.badge as badge_send_akta_status
            from tb_sms_akta tsa 
            join tb_sms_pemohon tsp on tsa.id_sms_akta = tsp.id_sms_akta 
            join tb_sms_termohon tst on tsa.id_sms_akta = tst.id_sms_akta
            left join tb_user tuc on tsa.created_by = tuc.id_user 
            left join tb_user tuu on tsa.updated_by = tuu.id_user
            left join tb_sms_get_akta_status tsgas  on tsa.id_get_akta_status = tsgas.id_get_akta_status
            left join tb_sms_send_akta_status tssas on tsa.id_send_akta_status = tssas.id_send_akta_status 
            where 
            case when id_sms_akta_ is not null then tsa.id_sms_akta = id_sms_akta_ else true end
            group by
            tsa.id_sms_akta,
            tsa.id_perkara, 
            tsa.no_perkara,
            tsa.no_akta_cerai,
            tsp.nama,
            tsp.no_hp,
            tst.nama,
            tst.no_hp,
            tsa.created_at,
            tsa.updated_at,
            tsa.last_sync_akta_at,
            tsa.sms_send_at,
            tsa.sms_text,
            tsgas.id_get_akta_status,
            tsgas.status,
            tsgas.badge,
            tssas.id_send_akta_status,
            tssas.status,
            tssas.badge
            order by tsa.id_sms_akta desc 
            ;
        end
        ");
    }
}
// IGNORE_SPACE,
// STRICT_TRANS_TABLES,
// NO_ZERO_IN_DATE,
// NO_ZERO_DATE,
// NO_ENGINE_SUBSTITUTION

// table g     table x     table y
// g           x   g       y   g
// 55          1   55      2   55

// select g, x, y
// from g 
// join x on g.g=x.g
// join y on g.g=y.g
// group by g.g
// ;

// result:
// g   x    y
// 55  1    2 

// result:
// g   x    y
// 55  1    2 
// 55  1    2