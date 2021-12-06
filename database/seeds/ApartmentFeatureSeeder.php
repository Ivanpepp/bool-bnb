<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use App\Models\Apartment;
use App\Models\Feature;

class ApartmentFeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $apartments= Apartment::all();
        $feature_ids = Feature::pluck('id')->toArray();

       foreach($apartments as $apartment){
        $apartment->features()
                    ->sync
                    ([Arr::random($feature_ids),Arr::random($feature_ids),Arr::random($feature_ids),Arr::random($feature_ids),Arr::random($feature_ids)]);

       }
    }
}
