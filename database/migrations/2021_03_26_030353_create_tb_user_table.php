<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('
            create table tb_user(
                id_user int auto_increment,
                username varchar(256) not null,
                fullname varchar(256) not null,
                email varchar(256) not null,
                password varchar(256) not null,
                user_group varchar(256) not null,

                constraint pk_tb_user_user_id primary key(id_user),
                constraint uq_tb_user_username unique(username)
            );
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
    }
}
