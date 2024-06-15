<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ['Portraits', 'Landscape', 'Weddings', 'Events', 'Nature and Animals'];

        foreach ($categories as $cat) {
            $category = new Category();
            $category->name = $cat;
            $category->save();
        }
    }
}
