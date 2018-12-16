<?php

use Illuminate\Database\Seeder;

class LableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public $array = [
        ['name' => 'SOUNDVISION RECORDS'],
        ['name' => 'PARLOPHONE RECORDS'],
        ['name' => 'CAPITOL RECORDS'],
        ['name' => 'VERNE RECORDS'],
        ['name' => 'ATLANTIC RECORDS'],
        ['name' => 'POLYDOR RECORD'],
        ['name' => 'CASABLANCA RECORD'],
        ['name' => 'A&M RECORDS AMLH '],
        ['name' => 'PARAMOUNT RECORDS'],
        ['name' => 'REPRISE RECORDS'],
        ];

    public function run()
    {
        foreach ($this->array as $arr)
            DB::table('labels')->insert(
                [
                    'name' => $arr['name']
                ]

            );
    }
}

