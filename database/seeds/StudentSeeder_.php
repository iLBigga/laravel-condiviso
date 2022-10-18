<?php

use App\Student;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i < 100; $i++){
            $s = new Student();
            $s->name = $faker->firstName();
            $s->surname = $faker->lastName();
            $s->date_of_birth = $faker->date();
            $s->fiscal_code = strtoupper($faker->unique()->bothify('??????##?##?###?'));
            $s->enrolment_date = $faker->date();
            $s->registration_number = $faker->unique()->randomNumber(5, true);
            $s->email = $faker->unique()->email();

            $s->save();
        };
    }
}
