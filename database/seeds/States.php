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
        $states = array("Still Sealed", "Mint", "Near Mint", "Very Good", "Good", "Excellent");

        foreach ($states as $arr) {
            DB::table('state')->insert([
                "name" => $arr
            ]);
        }
    }
}
