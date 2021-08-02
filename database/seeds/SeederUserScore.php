<?php

use Illuminate\Database\Seeder;

class SeederUserScore extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("
            truncate tb_user_score;
        ");

        DB::statement("
            insert into tb_user_score(
                id,
                name,
                score,
                emotion,
                created
            )
            values
            ('1','Kevin','80','Happy','2020-02-20'),
            ('2','Josh','90','Sad','2020-02-20'),
            ('3','Kevin','85','Happy','2020-02-20'),
            ('4','Kevin','75','Sad','2020-02-20'),
            ('5','Josh','65','Angry','2020-02-20'),
            ('6','David','85','Happy','2020-02-21'),
            ('7','Josh','90','Sad','2020-02-21'),
            ('8','David','75','Sad','2020-02-21'),
            ('9','Josh','85','Sad','2020-02-21'),
            ('10','Josh','70','Happy','2020-02-21'),
            ('11','Kevin','80','Sad','2020-02-21'),
            ('12','Kevin','73','Sad','2020-02-22'),
            ('13','Kevin','75','Angry','2020-02-22'),
            ('14','David','82','Sad','2020-02-22'),
            ('15','David','65','Sad','2020-02-22')
            ;
        ");
    }
}
