<?php

use Illuminate\Database\Seeder;

class SpGetUserScoreAvg extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::unprepared("DROP PROCEDURE IF EXISTS get_user_score_avg;");
        
        DB::unprepared("CREATE PROCEDURE get_user_score_avg(
        )
        begin
            select 
            name,
            avg(score)
            from tb_user_score 
            group by name 
            ;
        end
        ");
    }
}
