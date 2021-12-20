<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Faker\Generator as Faker;
use App\User;
use App\Models\Apartment;

class ApartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $user_ids = User::pluck('id')->toArray();

/*         for ($i = 0 ; $i < 101 ; $i++){
            $newApartment = new Apartment();
            $newApartment->user_id = Arr::random($user_ids);
            $newApartment->title = $faker->sentence();
            $newApartment->description = $faker->paragraph(6, true);
            $newApartment->city = $faker->city();
            $newApartment->address = $faker->streetName() . ' ' .  $faker->buildingNumber();
            $newApartment->latitude = $faker->latitude($min = -90, $max= 90);
            $newApartment->longitude = $faker->longitude($min = -180, $max=180);
            $newApartment->price = $faker->randomFloat(2, 50, 20000);
            $newApartment->type = $faker->words(2, true);
            $newApartment->	total_room = rand(1,9);
            $newApartment->	total_guest = rand(1,9);
            $newApartment->	total_bathroom = rand(1,8);
            $newApartment->	mq = rand(30,500);
            $newApartment->	is_visible = true;
            $newApartment->save();
        } */
    }
}
