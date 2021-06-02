<?php

use Illuminate\Database\Seeder;

class SpGetListBerkasPerkara extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::unprepared("DROP PROCEDURE IF EXISTS get_list_berkas_perkara;");
        
        DB::unprepared("CREATE PROCEDURE get_list_berkas_perkara(
            role_ varchar(50),
            id_user_created_ int
        )
        begin
        select
            bp.id_berkas,
            bp.kode_berkas,
            date_format(bp.tgl_penyerahan, '%d/%m/%Y') as tgl_penyerahan,
			group_concat(p.no_perkara separator ', ') as no_perkara,
            bp.id_berkas_status,
            bs.berkas_status,
            bs.badge,
            concat(u_cr.nama, ' pada ', date_format(bp.created_at, '%d/%m/%Y %H:%i')) as created,
            concat(u_up.nama, ' pada ', date_format(bp.updated_at, '%d/%m/%Y %H:%i')) as updated,
            concat(u_ap.nama, ' pada ', date_format(bp.approved_at, '%d/%m/%Y %H:%i')) as approved,
            concat(u_re.nama, ' pada ', date_format(bp.rejected_at, '%d/%m/%Y %H:%i')) as rejected,
            bp.created_by,
            bp.grup_jenis_perkara,
            gjp.nama_grup_jenis_perkara
            from
            tb_berkas_perkara bp
            join tb_perkara p on bp.kode_berkas = p.kode_berkas 
            join tb_berkas_status bs on bp.id_berkas_status = bs.id_berkas_status
            join tb_jenis_perkara jp on p.id_jenis_perkara = jp.id_jenis_perkara
            join tb_grup_jenis_perkara gjp on bp.grup_jenis_perkara = gjp.grup_jenis_perkara 
            join tb_user u_cr on bp.created_by = u_cr.id_user 
            left join tb_user u_up on bp.updated_by = u_up.id_user 
            left join tb_user u_ap on bp.approved_by = u_ap.id_user 
            left join tb_user u_re on bp.rejected_by = u_re.id_user
            where
            case
                when role_ is not null and id_user_created_ is not null then 
                    case
                        when role_ = 'panitera_pengganti' then
                            bp.created_by = id_user_created_
                        when role_ = 'panmud_gugatan' then
                            bp.grup_jenis_perkara = 'G' or bp.created_by = id_user_created_
                        when role_ = 'panmud_permohonan' then
                            bp.grup_jenis_perkara = 'P' or bp.created_by = id_user_created_
                        -- when role_ = 'panmud_permohonan_' or role_ = 'panmud_gugatan' then
                        --     case 
                        --         when role_ = 'panmud_permohonan_' then
                        --             bp.grup_jenis_perkara = 'P'
                        --         else 
                        --             bp.grup_jenis_perkara = 'G'
                        --     end
                        else true
                    end
                else true
            end
			group by bp.id_berkas, bp.kode_berkas, bp.tgl_penyerahan, bp.id_berkas_status, bs.berkas_status, bs.badge,
            u_cr.nama, u_up.nama, u_ap.nama, u_re.nama,
            created, updated, approved, rejected,
            bp.created_by, 
            bp.grup_jenis_perkara, gjp.nama_grup_jenis_perkara
            order by bp.id_berkas desc
            ;
        end
        ");

        // DB::unprepared("CREATE PROCEDURE get_list_berkas_perkara(
        //     in kode_berkas_ varchar(20)
        // )
        // begin
        // select
        //     bp.id_berkas,
        //     bp.kode_berkas,
        //     date_format(bp.tgl_penyerahan, '%d/%m/%Y') as tgl_penyerahan,
        //     group_concat(p.no_perkara separator ', ') as no_perkara,
        //     bs.berkas_status,
        //     u_cr.nama as created_by,
        //     date_format(bp.created_at, '%d/%m/%Y %H:%i:%s') as created_at,
        //     u_up.nama as updated_by,
        //     date_format(bp.updated_at, '%d/%m/%Y %H:%i:%s') as updated_at,
        //     u_ap.nama as approved_by,
        //     date_format(bp.approved_at, '%d/%m/%Y %H:%i:%s') as approved_at,
        //     u_re.nama as rejected_by,
        //     date_format(bp.rejected_at, '%d/%m/%Y %H:%i:%s') as rejected_at
        //     from
        //     tb_berkas_perkara bp
        //     join tb_perkara p on bp.kode_berkas = p.kode_berkas 
        //     join tb_berkas_status bs on bp.id_berkas_status = bs.id_berkas_status 
        //     join tb_user u_cr on bp.created_by = u_cr.id_user 
        //     left join tb_user u_up on bp.updated_by = u_up.id_user 
        //     left join tb_user u_ap on bp.approved_by = u_ap.id_user 
        //     left join tb_user u_re on bp.rejected_by = u_re.id_user
        //     group by bp.id_berkas, bp.kode_berkas, bp.tgl_penyerahan, bs.berkas_status,
        //     u_cr.nama, u_up.nama, u_ap.nama, u_re.nama,
        //     bp.created_at, bp.updated_at, bp.approved_at, bp.rejected_at
        //     order by bp.id_berkas desc
        //     ;
        // end
        // ");
    }
}
