<?php

use Illuminate\Database\Seeder;

class SpGetUserScoreModus extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::unprepared("DROP PROCEDURE IF EXISTS get_user_score_modus;");
        
        DB::unprepared("CREATE PROCEDURE get_user_score_modus(
        )
        begin
            select
            name,
            emotion,
            max(count_emotion) as count
            from
            (
                select 
                name,
                emotion, 
                count(emotion) as count_emotion
                from tb_user_score 
                group by name, emotion
                order by name asc, count_emotion desc
            ) as us
            group by name 
            ;
        end
        ");
    }
}
