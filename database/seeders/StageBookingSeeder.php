<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StageBookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Booking::create([
            'mate_id' => 5,
            'trainer_id' => 35,
            'title' => 'train for fun',
            'description' => 'my friends and i are looking for a competent trainer for street workout',
            'location' => 'storkower straße 225',
            'status'=>'pending',
            'maxppl' => 5,
            'price' => 50,
            'time' => '2021-08-20 17:00:00'
        ]);
        \App\Models\Booking::create([
            'mate_id' => 5,
            'trainer_id' => 45,
            'title' => 'training session',
            'description' => 'i am looking for personal trainer for my two kids',
            'location' => 'storkower straße 225',
            'status'=>'pending',
            'maxppl' => 2,
            'price' => 60,
            'time' => '2021-08-20 10:00:00'
        ]);

        \App\Models\Booking::create([
            'mate_id' => 15,
            'trainer_id' => 35,
            'title' => 'family sport',
            'description' => 'we are looking for a personal trainer for our family',
            'location' => 'storkower straße 225',
            'status'=>'pending',
            'maxppl' => 4,
            'price' => 50,
            'time' => '2021-08-21 16:00:00'
        ]);
        \App\Models\Booking::create([
            'mate_id' => 15,
            'trainer_id' => 45,
            'title' => 'yoga',
            'description' => 'i am looking for yoga instructor to help me meditade',
            'location' => 'storkower straße 225',
            'status'=>'pending',
            'maxppl' => 1,
            'price' => 60,
            'time' => '2021-08-21 10:00:00'
        ]);

        \App\Models\Booking::create([
            'mate_id' => 25,
            'trainer_id' => 35,
            'title' => 'looking for personal trainer for boxing',
            'description' => 'male',
            'location' => 'storkower straße 225',
            'status'=>'pending',
            'maxppl' => 1,
            'price' => 50,
            'time' => '2021-08-22 17:00:00'
        ]);
        \App\Models\Booking::create([
            'mate_id' => 25,
            'trainer_id' => 45,
            'title' => 'Hiit workout',
            'description' => 'looking for hiit trainer for sport group',
            'location' => 'storkower straße 225',
            'status'=>'pending',
            'maxppl' => 6,
            'price' => 60,
            'time' => '2021-08-22 10:00:00'
        ]);
    }
}
