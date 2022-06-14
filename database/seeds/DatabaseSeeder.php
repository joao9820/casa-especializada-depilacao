<?php

use App\Service;
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
        // $this->call(UserSeeder::class);
        $this->call(ServiceGroupSeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(PromotionSeeder::class);
        $this->call(SocialMediaSeeder::class);
        $this->call(UnitSeeder::class);

    }
}
