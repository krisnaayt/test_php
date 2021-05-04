<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnApproveRejectOnTbBerkasPerkaraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            alter table tb_berkas_perkara 
            add column approved_by int null,
            add column approved_at datetime null,
            add column rejected_by int null,
            add column rejected_at datetime null
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("
            alter table tb_berkas_perkara
            drop column approved_by,
            drop column approved_at,
            drop column rejected_by,
            drop column rejected_at
        ");
    }
}
