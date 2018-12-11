<?php

use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public $array = [
        ['name' => 'Германия'],
        ['name' => 'Англия'],
        ['name' => 'США'],
        ['name' => 'Франция'],
        ['name' => 'Нидерланды'],
        ['name' => 'Россия'],
        ['name' => 'Казахстан'],
        ['name' => 'Украина'],
        ['name' => 'Беларусь'],
        ];

    public function run()
    {
        foreach ($this->array as $arr)
            DB::table('countries')->insert(
                [
                    'name' => $arr['name']
                ]

            );
    }
}
