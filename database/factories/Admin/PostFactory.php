<?php

namespace Database\Factories\Admin;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'=>fake()->sentence(6),
            'category_id'=>fake()->randomNumber(1,10),
            'slug'=>fake()->sentence(4),
            'sub_title'=>fake()->paragraph(10),
            'description'=>fake()->sentence(50),
            'status'=>fake()->randomNumber(1)
        ];
    }
}
