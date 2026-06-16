<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Objek', 'slug' => 'objek'],
            ['name' => 'Stasiun', 'slug' => 'stasiun'],
            ['name' => 'Gerbong', 'slug' => 'gerbong'],
            ['name' => 'Rute', 'slug' => 'rute'],
            ['name' => 'Lainnya', 'slug' => 'lainnya'],
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate(
                ['slug' => $category['slug']],
                ['name' => $category['name']]
            );
        }
    }
}
