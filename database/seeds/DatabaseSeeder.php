<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SeederUserScore::class);
        
        $this->call(SpExportProductItem::class);
        $this->call(SpGetListProductItem::class);
        $this->call(SpGetUserScoreAvg::class);
        $this->call(SpGetUserScoreAvgModus::class);
        $this->call(SpGetUserScoreModus::class);
    }
}
