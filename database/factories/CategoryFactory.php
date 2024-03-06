<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

class CategoryFactory extends Factory
{
    protected $model = \App\Models\Category::class;

    public function definition()
    {
        return [
            'id' => $this->faker->unique()->numberBetween(Category::count(), Category::count() + 100),
            'category' => $this->faker->text(10),
        ];
    }
}
