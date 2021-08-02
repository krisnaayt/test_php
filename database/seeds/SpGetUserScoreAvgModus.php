<?php

use Illuminate\Database\Seeder;

class SpGetUserScoreAvgModus extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::unprepared("DROP PROCEDURE IF EXISTS get_user_score_avg_modus;");
        
        DB::unprepared("CREATE PROCEDURE get_user_score_avg_modus(
        )
        begin
        select
            us.name,
            us.emotion,
            us2.average,
            us.created
            from
            (
                select 
                name,
                emotion, 
                count(emotion) as count_emotion,
                created
                from tb_user_score 
                group by name, emotion, created 
                order by name asc, count_emotion desc
            ) as us
            join (
            	select 
				name,
				avg(score) as average,
				created
				from tb_user_score 
				group by name, created
            ) as us2 on us.name = us2.name and us.created = us2.created
            group by us.name, us.created 
            ;
        end
        ");
    }
}
