<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                "name" => "Beach",
                "description" => "Coastal destinations for relaxing on the beach."
            ],
            [
                "name" => "City Tours",
                "description" => "Exploration of major cities and their main attractions."
            ],
            [
                "name" => "Cultural",
                "description" => "Experiences focused on the culture, history, and traditions of the destinations."
            ],
            [
                "name" => "Honeymoon",
                "description" => "Romantic trips for newlyweds."
            ],
            [
                "name" => "Safari",
                "description" => "Expeditions to observe wildlife in their natural habitat."
            ],
            [
                "name" => "Eco-Tourism",
                "description" => "Sustainable and environmentally friendly travel."
            ],
            [
                "name" => "Historical",
                "description" => "Visits to historical places and heritage sites."
            ],
            [
                "name" => "Festival & Events",
                "description" => "Packages that include festivals and special events."
            ]
        ];

        DB::table('categories')->insert($categories);
    }
}
