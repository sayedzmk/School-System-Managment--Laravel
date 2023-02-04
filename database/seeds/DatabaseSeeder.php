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
        // $this->call(TypeBooldSeeder::class);
        // $this->call(NationalitySeeder::class);
        // $this->call(ReligionsSeeder::class);
        // $this->call(GenderSeeder::class);
        // $this->call(specializationSeeder::class);
        $this->call(SettingSeeder::class);
    }
}
