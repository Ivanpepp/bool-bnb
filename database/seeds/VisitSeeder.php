<?php


use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Faker\Generator as Faker;
use App\Models\Apartment;
use App\Models\Visit;
class VisitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        /* $apartment_ids = Apartment::pluck('id')->toArray();

        for ($i = 0 ; $i < 20 ; $i++){
            $newVisit = new Visit();
            $newVisit->apartment_id = Arr::random($apartment_ids);
            $newVisit->ip_address = $faker->ipv4();
            $newVisit->save();
        } */
    }
}
