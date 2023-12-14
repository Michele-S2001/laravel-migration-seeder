<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Generator as Faker;
use App\Models\Train;

class TrainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i = 0; $i < 50; $i++) {
            $newTrain = new Train();
            $newTrain->company = $faker->word();
            $newTrain->departure_station = $faker->text(30);
            $newTrain->arrival_station = $faker->text(30);
            $newTrain->departure_date = $faker->dateTimeInInterval('-1 days', '+2 days');
            $newTrain->arrival_date = $faker->dateTimeInInterval('now', '+2 days');
            $newTrain->departure_time = $faker->time(); 
            $newTrain->arrival_time = $this->getArrivalTime($newTrain, $faker);
            $newTrain->train_code = $faker->randomNumber(4, true);
            $newTrain->number_of_carriage = $faker->numberBetween(2, 24);
            $newTrain->in_time = $faker->randomElement([false, true]);
            $newTrain->deleted = $faker->randomElement([false, true]);
            $newTrain->save();
        }
    }

    public function getArrivalTime($_newTrain, $_faker) {
        do {
            $fakeTime = $_faker->time();
        } while ($_newTrain->departure_time > $fakeTime);
        return $fakeTime;
    }
}
