<?php

use Illuminate\Database\Seeder;

class SpGetSuratReport extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::unprepared("DROP PROCEDURE IF EXISTS get_surat_report;");
        
        DB::unprepared("CREATE PROCEDURE get_surat_report(
            start_date_ date,
            end_date_ date
        )
        begin
            select
            (@row_number:=@row_number + 1) as no,
            concat(lpad(sp.no_surat, 4, '0'), '/', 'SP-PSP', '/', sp.bulan_surat, '/', sp.tahun_surat, '/', 'PA.Blcn') as no_surat_full,
            concat(sp.no_perkara, '/', 'Pdt.', sp.info_perkara, '/', sp.tahun_perkara, '/', 'PA.Blcn') as no_perkara_full,
            sp.nama,
            sp.alamat,
            sp.no_telp,
            sp.sebagai,
            sp.no_rekening,
            sp.nama_rekening,
            sp.cabang,
            date_format(sp.created_at, '%d-%m-%Y %H:%i:%s') as created_at,
            date_format(sp.updated_at, '%d-%m-%Y %H:%i:%s') as updated_at
            from tb_surat_panjar sp
            left join tb_user uc on sp.created_by = uc.id_user 
            left join tb_user uu on sp.updated_by = uu.id_user,
            (SELECT @row_number:=0) as t
            where 
            case 
                when start_date_ is not null and end_date_ is not null then 
                    date_format(sp.created_at, '%Y-%m-%d') >= start_date_ and date_format(sp.created_at, '%Y-%m-%d') <= end_date_ 
                else true 
            end
            order by sp.no_surat asc 
            ;
        end
        ");
    }
}
