<?php

use Illuminate\Database\Seeder;

class SingerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public $array = [
        ['name' => 'KLAUS SCHULZE'],
        ['name' => 'VANGELIS'],
        ['name' => 'KRAFTWERK'],
        ['name' => 'TANGERINE DREAM'],
        ['name' => 'TOMITA '],
        ['name' => 'ALVIN LEE'],
        ['name' => 'ANGEL'],
        ['name' => 'BABE RUTH'],
        ['name' => 'BARCLAY JAMES HARVEST'],
        ['name' => 'BEATLES '],
        ['name' => 'BLODWYN PIG '],
        ['name' => 'BOSTON'],
        ['name' => 'CHRIS DE BURGH'],
        ['name' => 'ELTON JOHN'],
        ['name' => 'FOREIGNER'],
        ['name' => 'FRANK ZAPPA AND MOTHERS'],
        ['name' => 'FOREIGNER'],
        ['name' => 'MAINHORSE AIRLINE'],
        ['name' => 'TOE FAT'],

    ];

    public function run()
    {
        foreach ($this->array as $arr)
            DB::table('singer')->insert(
                [
                    'name' => $arr['name']
                ]

            );
    }
}