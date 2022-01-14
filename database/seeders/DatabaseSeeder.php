<?php

namespace Database\Seeders;

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
        $this->call(UsersSeeder::class);
        $this->call(StageActivitySeeder::class);
        $this->call(StageBookingSeeder::class);
        //$this->call(ActivitySeeder::class);
        //$this->call(BookingSeeder::class);
    }
}
