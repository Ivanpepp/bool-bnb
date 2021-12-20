<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Faker\Generator as Faker;
use App\Models\Apartment;
use App\Models\Photo;

class PhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
/*         $apartment_ids = Apartment::pluck('id')->toArray();

        for ($i = 0 ; $i < 500 ; $i++){
            $newPhoto = new Photo();
            $newPhoto->apartment_id = Arr::random($apartment_ids);
            $newPhoto->image_thumb = $faker->imageUrl(400, 400, $newPhoto->apartment->title, true);
            $newPhoto->save();
        } */
    }
}
