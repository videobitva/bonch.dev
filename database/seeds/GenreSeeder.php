<?php

use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public $array = [
        ['name' => 'Electronic'],
        ['name' => 'RocknRoll'],
    ];

    public function run()
    {
        foreach ($this->array as $arr)
            DB::table('genre')->insert(
                [
                    'name' => $arr['name']
                ]

            );
    }
}
