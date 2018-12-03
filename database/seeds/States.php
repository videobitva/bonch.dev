<?php

use Illuminate\Database\Seeder;

class States extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $states = array("Battle-Scarred", "Well-Worn", "Field-Tested", "Minimal Wear", "Factory new");

        foreach ($states as $arr) {
            DB::table('state')->insert([
                "name" => $arr
            ]);
        }
    }
}
