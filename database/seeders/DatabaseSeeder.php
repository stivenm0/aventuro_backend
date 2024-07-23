<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Item;
use App\Models\Offer;
use App\Models\Package;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(15)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(CategorySeeder::class);
        $this->call(MoonshineSeeder::class);

        Package::factory(50)
        ->has(Item::factory()->count(5))
        ->has(Offer::factory()->count(1))
        ->create();

        Booking::factory(30)->create();
    }
}
