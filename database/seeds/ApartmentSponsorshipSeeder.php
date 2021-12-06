<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use App\Models\Apartment;
use App\Models\Sponsorship;

class ApartmentSponsorshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $apartments= Apartment::all();
        $sponsorship_ids = Sponsorship::pluck('id')->toArray();

       foreach($apartments as $apartment){
        $apartment->sponsorships()
                    ->sync
                    ([Arr::random($sponsorship_ids)]);

       }
    }
}
