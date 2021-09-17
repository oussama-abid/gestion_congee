<?php

use Illuminate\Database\Seeder;
use App\Pdg; 
class PdgsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Pdg::class, 3)->create();

    }
}
