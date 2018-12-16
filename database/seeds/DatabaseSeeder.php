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
        // $this->call(UsersTableSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(GenreSeeder::class);
        $this->call(LableSeeder::class);
        $this->call(SingerSeeder::class);
        $this->call(States::class);
        $this->call(PlateSeeder::class);
    }
}
