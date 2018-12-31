<?php

use Illuminate\Database\Seeder;
use App\Entities\Category;
class CategorysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::insert([

            ['name' => 'LESS x DICKIES'],
            ['name' => 'HATS & CAPS'],
            ['name' => 'JACKETS'],
            ['name' => 'HOODIE & SWEAT'],
            ['name' => 'SHIRTS'],
            ['name' => 'T-SHIRTS'],
            ['name' => 'PANTS'],
            ['name' => 'SHORT'],
            ['name' => 'SHOES'],
            ['name' => 'ACCESSORIES']

        ]);
    }
}
