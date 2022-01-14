<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StageActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Activity::create([
            'user_id' => 5,
            'title' => 'workout im park',
            'description' => 'Yoga training for 2 hours in the park',
            'location' => 'Storkower straße 225, 10367 berlin',
            'time' => '2021-06-20 17:03:41',
            'type' => 'event',
            'maxppl' => 30,
            'participants' => json_encode([15,5]),
            'price' => 30,
        ]);
        \App\Models\Activity::create([
            'user_id' => 5,
            'title' => 'boxing basics',
            'description' => 'in this session we learn the basics of t boxing',
            'location' => 'Storkower straße 225, 10551 berlin',
            'time' => '2021-06-20 17:03:41',
            'type' => 'event',
            'maxppl' => 30,
            'participants' => json_encode([5,15]),
            'price' => 20,
        ]);
        \App\Models\Activity::create([
            'user_id' => 5,
            'title' => 'HIIT',
            'description' => 'today we hirt all body parts in 90 minutes session ',
            'location' => 'Storkower straße 225, 10367 berlin',
            'time' => '2021-06-20 17:03:41',
            'type' => 'event',
            'maxppl' => 25,
            'participants' => json_encode([5,25]),
            'price' => 25,
        ]);
        \App\Models\Activity::create([
            'user_id' => 15,
            'title' => 'run for the nature',
            'description' => 'the fees will be founded to the organisation free the trees',
            'location' => 'Storkower straße 225, 10678 berlin',
            'time' => '2021-06-20 17:03:41',
            'type' => 'event',
            'maxppl' => 50,
            'participants' => json_encode([15,25]),
            'price' => 15,
        ]);



        \App\Models\Activity::create([
            'user_id' => 15,
            'title' => 'jogging',
            'description' => 'i am looking for jogging partner',
            'location' => 'Brandenburgische Straße 20, 10969 Berlin',
            'time' => '2021-06-20 17:03:41',
            'type' => 'activity',
            'maxppl' => 4,
            'participants' => json_encode([15,5]),
            'price' => 20,
        ]);


        \App\Models\Activity::create([
            'user_id' => 25,
            'title' => 'training partner',
            'description' => 'looking for training partner outdoor',
            'location' => 'potsdamer straße 70, 10785 Berlin',
            'time' => '2021-06-20 17:03:41',
            'type' => 'activity',
            'maxppl' => 3,
            'participants' => json_encode([25,15]),
            'price' => 0,
        ]);
        \App\Models\Activity::create([
            'user_id' => 25,
            'title' => 'boxing partner',
            'description' => 'looking for partner to spare with',
            'location' => 'oldenburger straße 19, 10551',
            'time' => '2021-06-20 17:03:41',
            'type' => 'activity',
            'maxppl' => 2,
            'participants' => json_encode([25,5]),
            'price' => 0,
        ]);
        \App\Models\Activity::create([
            'user_id' => 25,
            'title' => 'maarhton',
            'description' => 'looking for partner for marathon',
            'location' => 'oldenburger straße 19, 10551',
            'time' => '2021-06-20 17:03:41',
            'type' => 'activity',
            'maxppl' => 4,
            'participants' => json_encode([25,5]),
            'price' => 0,
        ]);


        \App\Models\Activity::create([
            'user_id' => 35,
            'title' => 'plyometric cardio',
            'description' => 'Circuit workout in gym',
            'location' => 'Storkower straße 225',
            'time' => '2021-06-20 17:03:41',
            'type' => 'event',
            'maxppl' => 15,
            'participants' => json_encode([25]),
            'price' => 10,
        ]);
        \App\Models\Activity::create([
            'user_id' => 35,
            'title' => 'HIIT workout',
            'description' => 'HIIT workout in Park',
            'location' => 'oldenburger straße 18, 10551 berlin',
            'time' => '2021-06-20 17:03:41',
            'type' => 'activity',
            'maxppl' => 15,
            'participants' => json_encode([5]),
            'price' => 10,
        ]);
        \App\Models\Activity::create([
            'user_id' => 45,
            'title' => 'yoga workout',
            'description' => 'yoga and meditation for everyone',
            'location' => 'oldenburger straße 20, 10552 ',
            'time' => '2021-06-20 17:03:41',
            'type' => 'activity',
            'maxppl' => 10,
            'participants' => json_encode([15]),
            'price' => 5,
        ]);
        \App\Models\Activity::create([
            'user_id' => 45,
            'title' => 'BJJ',
            'description' => 'BJJ open mat',
            'location' => 'bissing zeile , 10367 belrin',
            'time' => '2021-06-20 17:03:41',
            'type' => 'event',
            'maxppl' => 1,
            'participants' => json_encode([15]),
            'price' => 10,
        ]);
    }
}
