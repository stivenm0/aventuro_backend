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
                "name" => "Adventure",
                "description" => "Packages oriented towards activities like hiking, climbing, rafting, and more."
            ],
            [
                "name" => "Beach",
                "description" => "Coastal destinations for relaxing on the beach."
            ],
            [
                "name" => "City Tours",
                "description" => "Exploration of major cities and their main attractions."
            ],
            [
                "name" => "Cruises",
                "description" => "Trips on cruise ships to various destinations."
            ],
            [
                "name" => "Cultural",
                "description" => "Experiences focused on the culture, history, and traditions of the destinations."
            ],
            [
                "name" => "Family",
                "description" => "Packages designed for families, with activities for all ages."
            ],
            [
                "name" => "Honeymoon",
                "description" => "Romantic trips for newlyweds."
            ],
            [
                "name" => "Luxury",
                "description" => "High-end travel experiences and exclusive services."
            ],
            [
                "name" => "Nature",
                "description" => "Natural destinations like national parks, nature reserves, and more."
            ],
            [
                "name" => "Road Trips",
                "description" => "Routes and trips by car through scenic landscapes."
            ],
            [
                "name" => "Safari",
                "description" => "Expeditions to observe wildlife in their natural habitat."
            ],
            [
                "name" => "Skiing",
                "description" => "Destinations for skiing and winter sports."
            ],
            [
                "name" => "Solo Travel",
                "description" => "Packages suitable for individual travelers."
            ],
            [
                "name" => "Sports",
                "description" => "Trips centered around sports events or activities."
            ],
            [
                "name" => "Wellness",
                "description" => "Getaways focused on health and well-being."
            ],
            [
                "name" => "Weekend Getaways",
                "description" => "Weekend escapes to nearby destinations."
            ],
            [
                "name" => "Wildlife",
                "description" => "Observation of fauna and flora in their natural environment."
            ],
            [
                "name" => "Winter",
                "description" => "Winter destinations and activities."
            ],
            [
                "name" => "Budget",
                "description" => "Affordable and economical travel packages."
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
                "name" => "Pilgrimage",
                "description" => "Trips to religious and spiritual destinations."
            ],
            [
                "name" => "Food & Wine",
                "description" => "Culinary and wine experiences."
            ],
            [
                "name" => "Festival & Events",
                "description" => "Packages that include festivals and special events."
            ]
        ];

        DB::table('categories')->insert($categories);
    }
}
