<?php

use Illuminate\Database\Seeder;

class SpGetPerkaraReport extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::unprepared("DROP PROCEDURE IF EXISTS get_perkara_report;");
        
        DB::unprepared("CREATE PROCEDURE get_perkara_report(
            serah_start_ date,
            serah_end_ date,
            putus_start_ date,
            putus_end_ date,
            minutasi_start_ date,
            minutasi_end_ date,
            bht_start_ date,
            bht_end_ date,
            id_jenis_perkara_ int,
            id_berkas_status_ int,
            id_user_created_ int
        )
        begin
            select
            row_number() over (
                order by tbp.kode_berkas asc, tp.id_perkara asc
            ) as row_num,
            -- tbp.id_berkas, 
            tbp.kode_berkas,
            tbs.berkas_status,
            date_format(tbp.tgl_penyerahan, '%d-%m-%Y') as tgl_penyerahan,
            -- tp.id_perkara,
            tp.no_perkara,
            concat(tjp.kode_jenis_perkara, ' - ', tjp.jenis_perkara) as nama_jenis_perkara,
            date_format(tp.tgl_putus, '%d-%m-%Y') as tgl_putus,
            date_format(tp.tgl_minutasi, '%d-%m-%Y') as tgl_minutasi,
            date_format(tp.tgl_bht, '%d-%m-%Y') as tgl_bht,
            tuc.nama as created_by_name,
            date_format(tbp.created_at, '%d-%m-%Y %H:%i:%s') as created_at,
            tuu.nama as updated_by_name,
            date_format(tbp.updated_at, '%d-%m-%Y %H:%i:%s') as updated_at,
            tua.nama as approved_by_name,
            date_format(tbp.approved_at, '%d-%m-%Y %H:%i:%s') as approved_at,
            tur.nama as rejected_by_name,
            date_format(tbp.rejected_at, '%d-%m-%Y %H:%i:%s') as rejected_at,
            tub.nama as set_bht_by_name,
            date_format(tbp.set_bht_at, '%d-%m-%Y %H:%i:%s') as set_bht_at,
            tbp.ket_status 
            from tb_berkas_perkara tbp
            join tb_perkara tp on tbp.kode_berkas = tp.kode_berkas 
            join tb_berkas_status tbs on tbp.id_berkas_status = tbs.id_berkas_status 
            join tb_jenis_perkara tjp on tp.id_jenis_perkara = tjp.id_jenis_perkara 
            join tb_user tuc on tbp.created_by = tuc.id_user
            left join tb_user tuu on tbp.updated_by = tuu.id_user 
            left join tb_user tua on tbp.approved_by = tua.id_user 
            left join tb_user tur on tbp.rejected_by = tur.id_user 
            left join tb_user tub on tbp.set_bht_by = tub.id_user
            where
            case 
                when serah_start_ is not null and serah_end_ is not null then
                    tbp.tgl_penyerahan >= serah_start_ and tbp.tgl_penyerahan <= serah_end_
                else true
            end
            and case 
                when putus_start_ is not null and putus_end_ is not null then
                    tp.tgl_putus >= putus_start_ and tp.tgl_putus <= putus_end_
                else true
            end
            and case 
                when minutasi_start_ is not null and minutasi_end_ is not null then
                    tp.tgl_minutasi >= minutasi_start_ and tp.tgl_minutasi <= minutasi_end_
                else true
            end
            and case 
                when bht_start_ is not null and bht_end_ is not null then
                    tp.tgl_bht >= bht_start_ and tp.tgl_bht <= bht_end_
                else true
            end
            and case when id_jenis_perkara_ is not null then tp.id_jenis_perkara = id_jenis_perkara_ else true end
            and case when id_berkas_status_ is not null then tbp.id_berkas_status = id_berkas_status_ else true end 
            and case when id_user_created_ is not null then tbp.created_by = id_user_created_ else true end
            group by 
            tbp.id_berkas, tbp.kode_berkas, tbp.tgl_penyerahan, tp.id_perkara, tp.no_perkara,
            tjp.kode_jenis_perkara, tjp.jenis_perkara, tp.tgl_putus, tp.tgl_minutasi, tp.tgl_bht,
            tuc.nama, tuu.nama, tua.nama, tur.nama, tub.nama,
            tbp.created_at, tbp.updated_at, tbp.approved_at, tbp.rejected_at, tbp.set_bht_at,
            tbs.berkas_status, tbp.ket_status
            order by tbp.kode_berkas asc, tp.id_perkara asc
            ;
        end
        ");
    }
}
