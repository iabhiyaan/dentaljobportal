<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Job\Entities\Job;
use Faker\Factory as Faker;
use Str;

class JobTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i=0; $i < 50; $i++) {
            Job::create([
                'employer_id' => $faker->numberBetween(1, 50),
                'jobcategory_id' => $faker->numberBetween(1, 50),
                'employer_name' => $faker->name,
                'location' => $faker->city,
                'job_title' => $faker->name,
                'slug'=> Str::slug($faker->name),
                'salary' => $faker->numberBetween(10000, 30000),
                'job_type' => $faker->randomElement(['part-time', 'full-time']),
                'working_hours' => $faker->numberBetween(1, 7),
                'part_time_working_hours' => $faker->numberBetween(1, 4),
                'published_date' => now(),
                'deadline_date' => now(),
            ]);
        }
    }
}
