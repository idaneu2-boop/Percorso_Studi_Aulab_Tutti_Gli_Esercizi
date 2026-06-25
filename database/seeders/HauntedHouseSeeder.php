<?php

namespace Database\Seeders;

use App\Models\HauntedHouse;
use Illuminate\Database\Seeder;

class HauntedHouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hauntedHouses = [
            [
                'name' => 'The Stanley Hotel',
                'location' => 'Estes Park, Colorado',
                'price_per_night' => 390,
                'description' => 'Un classico viaggio tra corridoi storici, vista sulle Rocky Mountains e leggende nate attorno a uno degli hotel infestati piu celebri degli Stati Uniti.',
                'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/81/The_Stanley_Hotel_in_Estes_Park%2C_a_town_on_the_eastern_edge_of_Rocky_Mountain_National_Park_in_north-central_Colorado_LCCN2015633407.jpg/960px-The_Stanley_Hotel_in_Estes_Park%2C_a_town_on_the_eastern_edge_of_Rocky_Mountain_National_Park_in_north-central_Colorado_LCCN2015633407.jpg',
                'is_recommended' => true,
            ],
            [
                'name' => 'Lizzie Borden House',
                'location' => 'Fall River, Massachusetts',
                'price_per_night' => 260,
                'description' => 'Una casa-museo con pernottamento e tour notturni, legata al caso irrisolto del 1892 e alle storie che da allora attraversano le sue stanze.',
                'image_url' => '/media/haunted-houses/lizzie-borden-house.jpg',
                'is_recommended' => true,
            ],
            [
                'name' => 'Winchester Mystery House',
                'location' => 'San Jose, California',
                'price_per_night' => 310,
                'description' => 'Una dimora vittoriana labirintica, famosa per scale interrotte, porte impossibili e racconti su presenze che non avrebbero mai lasciato la casa.',
                'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/ec/Winchester_Mystery_House_2023-07-17_02.jpg/960px-Winchester_Mystery_House_2023-07-17_02.jpg',
                'is_recommended' => true,
            ],
        ];

        foreach ($hauntedHouses as $hauntedHouse) {
            HauntedHouse::query()->updateOrCreate(
                ['name' => $hauntedHouse['name']],
                $hauntedHouse,
            );
        }
    }
}
