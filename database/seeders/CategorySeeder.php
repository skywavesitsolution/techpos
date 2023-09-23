<?php

namespace Database\Seeders;

use App\Models\Category\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'name' => 'Un categorized',
                'slug' => 'un-categorized'
            ],
            [
                'name' => 'Men',
                'slug' => 'men'
            ],
            [
                'name' => 'Women',
                'slug' => 'women'
            ],
            [
                'name' => 'Cloth',
                'slug' => 'cloth'
            ]
        ];

        foreach ($data as $category) {
            Category::create($category);
//            Category::create([
//                'name' => $category['name'],
//                'slug' => $category['slug'],
//            ]);
        }

    }
}
