<?php

use Illuminate\Database\Seeder;

class SpGetListSuratPanjar extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::unprepared("DROP PROCEDURE IF EXISTS get_list_surat_panjar;");
        
        DB::unprepared("CREATE PROCEDURE get_list_surat_panjar(
            in id_surat_ int 
        )
        begin
            select
            id_surat,
            concat(lpad(no_surat, 4, '0'), '/', 'SP-PSP', '/', bulan_surat, '/', tahun_surat, '/', 'PA.Blcn') as no_surat_full,
            concat(no_perkara, '/', 'Pdt.', info_perkara, '/', tahun_perkara, '/', 'PA.Blcn') as no_perkara_full,
            sp.nama,
            alamat,
            no_telp,
            sebagai,
            no_rekening,
            nama_rekening,
            cabang,
            concat(uc.username, ' at ', date_format(created_at, '%d-%m-%Y %H:%i')) as created,
            concat(uu.username, ' at ', date_format(updated_at, '%d-%m-%Y %H:%i')) as updated
            from tb_surat_panjar sp
            left join tb_user uc on sp.created_by = uc.id_user 
            left join tb_user uu on sp.updated_by = uu.id_user
            where 
            case when id_surat_ is not null then id_surat = id_surat_ else true end
            order by no_surat desc 
            ;
        end
        ");
    }
}
