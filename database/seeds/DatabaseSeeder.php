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
        $this->call(SeederUser::class);
        $this->call(SeederJenisPerkara::class);
        $this->call(SeederBerkasStatus::class);
        $this->call(SeederGrupJenisPerkara::class);
        
        $this->call(SpGetListSuratPanjar::class);
        $this->call(SpGetListBerkasPerkara::class);
        $this->call(SpGetSuratReport::class);
        $this->call(SpGetPerkaraReport::class);
    }
}
