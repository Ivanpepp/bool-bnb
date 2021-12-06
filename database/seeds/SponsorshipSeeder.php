<?php

use Illuminate\Database\Seeder;
use App\Models\Sponsorship;

class SponsorshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sponsors = [
            [
                'type' => 'Base',
                'price' => 2.99,
                'period' => 24,
            ],
            [
                'type' => 'Gold',
                'price' => 5.99,
                'period' => 72,
            ],
            [
                'type' => 'Premium',
                'price' => 9.99,
                'period' => 144,
            ]
        ];

        foreach($sponsors as $sponsor){
            $newSponsor = new Sponsorship();
            $newSponsor->type = $sponsor['type'];
            $newSponsor->price = $sponsor['price'];
            $newSponsor->period = $sponsor['period']; 
            $newSponsor->save(); 
        }
    }
}
