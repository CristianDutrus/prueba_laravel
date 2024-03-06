<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use App\Models\Entity;

class EntityFactory extends Factory
{
    protected $model = \App\Models\Entity::class;

    public function definition()
    {
        return [
            'id' => $this->faker->unique()->numberBetween(Entity::count(), Entity::count() + 100),
            'api' => $this->faker->url,
            'description' => $this->faker->text,
            'link' => $this->faker->url,
            'category_id' => Category::inRandomOrder()->first()->id,
        ];
    }
}
