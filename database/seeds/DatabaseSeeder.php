<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            ApartmentSeeder::class,
            MessageSeeder::class,
            VisitSeeder::class,
            SponsorshipSeeder::class,
            ApartmentSponsorshipSeeder::class,
            FeatureSeeder::class,
            ApartmentFeatureSeeder::class,
            PhotoSeeder::class,
        ]);
    }
}
