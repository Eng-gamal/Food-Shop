<?php

namespace Database\Seeders;

use App\Models\NewsLetter;
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
        // \App\Models\User::factory(10)->create();
        $this->call(LaratrustSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(SettingSeeder::class);
        $this->call(SettingContactSeeder::class);
        $this->call(SliderSeeder::class);
        $this->call(FeatureSeeder::class);
        $this->call(TestimonialSeeder::class);
        $this->call(AboutSeeder::class);
        $this->call(PageSeeder::class);
        $this->call(ProductSeeder::class);
        // $this->call(OfferSeeder::class);




        //        NewsLetter::factory(6000)->create();
    }
}
