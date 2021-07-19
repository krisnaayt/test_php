<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCommentToTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("
            alter table tb_sms_get_akta_status comment = '
            Diinput : Add SMS Akta;
            Waiting : Sudah sinkron sipp, akta kosong;
            Akta Tersedia : Sudah sinkron sipp, akta isi;
            Akta Cerai Sudah Diserahkan : tgl_penyerahan_akta_termohon di sipp terisi;
            ';
        ");

        DB::unprepared("
            alter table tb_sms_send_akta_status comment = '
            Pengiriman sms hanya sekali, jika gagal tidak diulang;
            SMS Berhasil Terkirim : Berhasil;
            SMS Gagal Terkirim : Gagal;
            ';
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared("alter table tb_sms_get_akta_status comment = '';");
        DB::unprepared("alter table tb_sms_send_akta_status comment = '';");

    }
}
