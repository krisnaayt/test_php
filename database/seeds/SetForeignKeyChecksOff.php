<?php

use Illuminate\Database\Seeder;

class SetForeignKeyChecksOff extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("SET FOREIGN_KEY_CHECKS = 0; ");
    }
}
