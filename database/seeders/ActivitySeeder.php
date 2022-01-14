<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Activity::create([
            'user_id' => 1,
            'title' => 'workout im park',
            'description' => 'Yoga training for 2 hours in the park',
            'location' => 'storkower straße 225, 10367 Berlin',
            'time' => '2021-06-20 17:03:41',
            'type' => 'activity',
            'maxppl' => 30,
            'participants' => json_encode([1]),
            'price' => 0,
        ]);
        \App\Models\Activity::create([
            'user_id' => 1,
            'title' => 'boxing basics',
            'description' => 'in this session we learn the basics of t boxing',
            'location' => 'damerow Straße 57k, 13187 Berlin',
            'time' => '2021-06-20 17:03:41',
            'type' => 'activity',
            'maxppl' => 30,
            'participants' => json_encode([1]),
            'price' => 0,
        ]);
        \App\Models\Activity::create([
            'user_id' => 1,
            'title' => 'HIIT',
            'description' => 'today we hirt all body parts in 90 minutes session ',
            'location' => 'luxemburger straße 10, 13353 Berlin',
            'time' => '2021-06-20 17:03:41',
            'type' => 'activity',
            'maxppl' => 25,
            'participants' => json_encode([1]),
            'price' => 0,
        ]);
        \App\Models\Activity::create([
            'user_id' => 2,
            'title' => 'run for the nature',
            'description' => 'the fees will be founded to the organisation free the trees',
            'location' => 'Siemens Str 16, 10551',
            'time' => '2021-06-20 17:03:41',
            'type' => 'activity',
            'maxppl' => 50,
            'participants' => json_encode([2]),
            'price' => 0,
        ]);



        \App\Models\Activity::create([
            'user_id' => 2,
            'title' => 'jogging',
            'description' => 'i am looking for jogging partner',
            'location' => 'bissingzeile 2, 10785 Berlin',
            'time' => '2021-06-20 17:03:41',
            'type' => 'activity',
            'maxppl' => 4,
            'participants' => json_encode([2]),
            'price' => 0,
        ]);


        \App\Models\Activity::create([
            'user_id' => 3,
            'title' => 'training partner',
            'description' => 'looking for training partner outdoor',
            'location' => 'oldenburger straße 19, 10551',
            'time' => '2021-06-20 17:03:41',
            'type' => 'activity',
            'maxppl' => 3,
            'participants' => json_encode([3]),
            'price' => 0,
        ]);
        \App\Models\Activity::create([
            'user_id' => 3,
            'title' => 'boxing partner',
            'description' => 'looking for partner to spare with',
            'location' => 'oldenburger straße 19, 10551',
            'time' => '2021-06-20 17:03:41',
            'type' => 'activity',
            'maxppl' => 2,
            'participants' => json_encode([3]),
            'price' => 0,
        ]);
        \App\Models\Activity::create([
            'user_id' => 3,
            'title' => 'maarhton',
            'description' => 'looking for partner for marathon',
            'location' => 'potsdamer straße 70, 10785 Berlin',
            'time' => '2021-06-20 17:03:41',
            'type' => 'activity',
            'maxppl' => 4,
            'participants' => json_encode([3]),
            'price' => 0,
        ]);


        \App\Models\Activity::create([
            'user_id' => 4,
            'title' => 'plyometric cardio',
            'description' => 'Circuit workout in gym',
            'location' => 'Brandenburgische Straße 20, 10969 Berlin',
            'time' => '2021-06-20 17:03:41',
            'type' => 'event',
            'maxppl' => 15,
            'participants' => json_encode([4]),
            'price' => 10,
        ]);
        \App\Models\Activity::create([
            'user_id' => 4,
            'title' => 'HIIT workout',
            'description' => 'HIIT workout in Park',
            'location' => 'Storkower straße 225, 10678 berlin',
            'time' => '2021-06-20 17:03:41',
            'type' => 'activity',
            'maxppl' => 15,
            'participants' => json_encode([4]),
            'price' => 10,
        ]);
        \App\Models\Activity::create([
            'user_id' => 5,
            'title' => 'yoga workout',
            'description' => 'yoga and meditation for everyone',
            'location' => 'Storkower straße 225, 10551 berlin',
            'time' => '2021-06-20 17:03:41',
            'type' => 'activity',
            'maxppl' => 10,
            'participants' => json_encode([5]),
            'price' => 5,
        ]);
        \App\Models\Activity::create([
            'user_id' => 5,
            'title' => 'BJJ',
            'description' => 'BJJ open mat',
            'location' => 'Storkower straße 225, 10367 berlin',
            'time' => '2021-06-20 17:03:41',
            'type' => 'event',
            'maxppl' => 1,
            'participants' => json_encode([5]),
            'price' => 10,
        ]);
    }
}
