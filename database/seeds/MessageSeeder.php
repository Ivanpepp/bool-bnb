<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Faker\Generator as Faker;
use App\Models\Apartment;
use App\Models\Message;
class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $apartment_ids = Apartment::pluck('id')->toArray();

        for ($i = 0 ; $i < 20 ; $i++){
            $newMessage = new Message();
            $newMessage->apartment_id = Arr::random($apartment_ids);
            $newMessage->email = $faker->email();
            $newMessage->name = $faker->name();
            $newMessage->surname = $faker->lastName();
            $newMessage->subject = $faker->words(5, true);
            $newMessage->content = $faker->paragraph(4, true);
            $newMessage->save();
        }
    }
}
