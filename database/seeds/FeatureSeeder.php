<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Feature;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $features = [
            
            'Parcheggio' => 'fas fa-parking', 
            'Servizio in camera' => 'fas fa-utensils', 
            'Palestra' => 'fas fa-dumbbell',  
            'Fumatori' =>"fas fa-smoking", 
            'Animali ammessi' =>"fas fa-paw", 
            'Piscina' => "fas fa-swimming-pool", 
            'Wi-Fi' => "fas fa-wifi",
            'Navetta' => "fas fa-bus",
            'Aria condizionata' => "far fa-snowflake",
            'Servizio disabili' => "fad fa-wheelchair"
        ];

        foreach($features as $key => $feature){
            $newFeature = new Feature();
            $newFeature->title = $key;
            $newFeature->icon = $feature;
            $newFeature->color = $faker->hexColor();
            $newFeature->save();

        }

    }
}
