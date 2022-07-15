<?php

namespace Database\Seeders;

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
        \App\Models\User::factory(10)->create();
        // \App\Models\City::factory(10)->create();
        // \App\Models\Business::factory(3)->create();
        // \App\Models\Category::factory(6)->create();
        // \App\Models\Property::factory(100)->create();
    }
}
