<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        $imageDirectory = storage_path('app/public/images');
//        $files = File::files($imageDirectory);

        $products = [
            [
                'id' => Str::uuid()->toString(),
                'name' => 'The Legend of Zelda: Breath of the Wild',
                'description' => 'The Legend of Zelda: Breath of the Wild is a 2017 action-adventure game developed and published by Nintendo for the Nintendo Switch and Wii U.',
                'price' => 30.09,
                'currency' => 'EUR',
                'stock' => 10,
//                'image' => 'zelda.jpeg',
                'image' => config('productsimages.images.' . 'The Legend of Zelda: Breath of the Wild', 'default.jpg'),
                'genre' => 'Action-Adventure',
            ],
            [
                'id' => Str::uuid()->toString(),
                'name' => 'Red Dead Redemption 2',
                'description' => 'Red Dead Redemption 2 is a 2018 action-adventure game developed and published by Rockstar Games. Available on PS4, Xbox One, Windows.',
                'price' => 59.99,
                'currency' => 'EUR',
                'stock' => 15,
//                'image' => 'rdr2.jpeg',
                'image' => config('productsimages.images.' . 'Red Dead Redemption 2', 'default.jpg'),
                'genre' => 'Action-Adventure',
            ],
            [
                'id' => Str::uuid()->toString(),
                'name' => "Assassin's Creed IV: Black Flag",
                'description' => "Assassin's Creed IV: Black Flag is a 2013 action-adventure video game developed by Ubisoft Montreal and published by Ubisoft. Available on PS4, Nintendo Switch, PS3, Xbox, Windows.",
                'price' => 39.99,
                'currency' => 'EUR',
                'stock' => 8,
//                'image' => 'ac4.jpeg',
                'image' => config('productsimages.images.' . "Assassin's Creed IV: Black Flag", 'default.jpg'),
                'genre' => 'Action-Adventure',
            ],
            [
                'id' => Str::uuid()->toString(),
                'name' => 'The Elder Scrolls V: Skyrim Special Edition',
                'description' => 'The Elder Scrolls V: Skyrim Special Edition brings the epic fantasy to life in stunning detail. The Special Edition includes the critically acclaimed game and add-ons with all-new features. Available on PS5, PS4, PS3, Xbox, Nintendo Switch, Windows',
                'price' => 39.99,
                'currency' => 'EUR',
                'stock' => 5,
//                'image' => 'es.jpeg',
                'image' => config('productsimages.images.' . 'The Elder Scrolls V: Skyrim Special Edition', 'default.jpg'),
                'genre' => 'Role-Playing',
            ],
            [
                'id' => Str::uuid()->toString(),
                'name' => 'Pacific Drive',
                'description' => 'Pacific Drive is a 2024 survival game developed by Ironwood Studios and published by Kepler Interactive. The game is set in the Pacific Northwest, which the player traverses trying to find a way to escape. Available on PS5, GeForce Now, Windows.',
                'price' => 23.99,
                'currency' => 'EUR',
                'stock' => 15,
//                'image' => 'pd.jpeg',
                'image' => config('productsimages.images.' . 'Pacific Drive', 'default.jpg'),
                'genre' => 'Survival',
            ],
            [
                'id' => Str::uuid()->toString(),
                'name' => 'God of War',
                'description' => 'God of War is a fantasy action-adventure game franchise created by David Jaffe and developed by Santa Monica Studio. Available on PS2, PSP, PS3, PS Vita, PS4, PS5, Windows.',
                'price' => 49.99,
                'currency' => 'EUR',
                'stock' => 4,
//                'image' => 'gow.jpeg',
                'image' => config('productsimages.images.' . 'God of War', 'default.jpg'),
                'genre' => 'Action-Adventure',
            ],
            [
                'id' => Str::uuid()->toString(),
                'name' => 'Sekiro: Shadows Die Twice',
                'description' => 'Sekiro: Shadows Die Twice is a 2019 action-adventure game developed by FromSoftware. Available on PS4, Xbox One, Windows.',
                'price' => 59.99,
                'currency' => 'EUR',
                'stock' => 18,
//                'image' => 'sekiro.jpeg',
                'image' => config('productsimages.images.' . 'Sekiro: Shadows Die Twice', 'default.jpg'),
                'genre' => 'Action-Adventure',
            ],
            [
                'id' => Str::uuid()->toString(),
                'name' => 'Resident Evil 4',
                'description' => "Resident Evil 4 is a survival horror game by Capcom. Agent Leon S. Kennedy is on a mission to rescue the US president's daughter, Ashley Graham, who has been kidnapped by a religious cult in rural Spain. Available on PS2, Android, PS4, Windows.",
                'price' => 39.99,
                'currency' => 'EUR',
                'stock' => 4,
//                'image' => 're4.jpeg',
                'image' => config('productsimages.images.' . 'Resident Evil 4', 'default.jpg'),
                'genre' => 'Survival Horror',
            ],
            [
                'id' => Str::uuid()->toString(),
                'name' => 'Hollow Knight',
                'description' => 'Hollow Knight is a 2017 Metroidvania video game developed and published by independent developer Team Cherry. Available on Nintendo Switch, PS4, macOS and more.',
                'price' => 14.99,
                'currency' => 'EUR',
                'stock' => 10,
//                'image' => 'hk.jpeg',
                'image' => config('productsimages.images.' . 'Hollow Knight', 'default.jpg'),
                'genre' => 'Metroidvania',
            ],
            [
                'id' => Str::uuid()->toString(),
                'name' => 'The Witcher 3: Wild Hunt',
                'description' => 'The Witcher is an action role-playing game developed by CD Projekt Red. It was based on the fantasy novel series The Witcher by Polish author Andrzej Sapkowski. Available on Windows, macOS, Classic Mac OS.',
                'price' => 39.99,
                'currency' => 'EUR',
                'stock' => 20,
//                'image' => 'witcher3.jpeg',
                'image' => config('productsimages.images.' . 'The Witcher 3: Wild Hunt', 'default.jpg'),
                'genre' => 'Role-Playing',
            ],
            [
                'id' => Str::uuid()->toString(),
                'name' => 'Hogwarts Legacy',
                'description' => 'Hogwarts Legacy is a 2023 action role-playing game developed by Avalanche Software and published by Warner Bros. The game is part of the Wizarding World franchise. Available on PS5, Nintendo Switch, PS4, Windows.',
                'price' => 59.99,
                'currency' => 'EUR',
                'stock' => 10,
//                'image' => 'hl.jpeg',
                'image' => config('productsimages.images.' . 'Hogwarts Legacy', 'default.jpg'),
                'genre' => 'Role-Playing',
            ]
        ];

        foreach ($products as $product) {
            DB::table('products')->insert([
                'id' => Str::uuid()->toString(),
                'name' => $product['name'],
                'description' => $product['description'],
                'price' => $product['price'],
                'currency' => $product['currency'],
                'stock' => $product['stock'],
                'image' => $product['image'],
                'genre' => $product['genre'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
