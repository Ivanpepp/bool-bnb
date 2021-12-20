<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $newUser = new User();
        $newUser->name = 'Ivan';
        $newUser->surname = 'Nastro';
        $newUser->date_of_birth = $faker->date('Y_m_d');
        $newUser->phone_number = '1234567890';
        $newUser->email = 'ivan@email.com';
        $newUser->password = bcrypt('12345678');
        $newUser->save();
        $newUser = new User();
        $newUser->name = 'Walter';
        $newUser->surname = 'Frongia';
        $newUser->date_of_birth = $faker->date('Y_m_d');
        $newUser->phone_number = '1234567895';
        $newUser->email = 'walter@email.com';
        $newUser->password = bcrypt('12345678');
        $newUser->save();
        $newUser = new User();
        $newUser->name = 'Jacopo';
        $newUser->surname = 'Censori';
        $newUser->date_of_birth = $faker->date('Y_m_d');
        $newUser->phone_number = '1234567893';
        $newUser->email = 'jacopo@email.com';
        $newUser->password = bcrypt('12345678');
        $newUser->save();
        $newUser = new User();
        $newUser->name = 'Antonio';
        $newUser->surname = 'Chiauzzi';
        $newUser->date_of_birth = $faker->date('Y_m_d');
        $newUser->phone_number = '1234567894';
        $newUser->email = 'antonio@email.com';
        $newUser->password = bcrypt('12345678');
        $newUser->save();

    /*     for ($i = 0 ; $i < 31 ; $i++){
            $newUser = new User();
            $newUser->name = $faker->name();
            $newUser->surname = $faker->lastName();
            $newUser->date_of_birth = $faker->date('Y_m_d');
            $newUser->phone_number = $faker->randomNumber(9, true) . rand(0,9);
            $newUser->email = $faker->safeEmail();
            $newUser->password = bcrypt($faker->password(9,14));
            $newUser->save();
        } */
    }
}
