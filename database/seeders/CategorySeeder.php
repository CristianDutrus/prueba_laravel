<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $query = new Category();
        $query->category = 'Animals';
        $query->save();

        $query = new Category();
        $query->category = 'Security';
        $query->save();
    }
}
