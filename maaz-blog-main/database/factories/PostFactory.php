<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),          //laravel will automatically create the user and assign its id to user_id variable
            'category_id' => Category::factory(),  //laravel will automatically create the Category rows and assign its id to category_id variable
            'tag_id' => Tag::factory(),            //laravel will automatically create the Tag rows and assign its id to tag_id variable
            'content' => $this->faker->paragraph(10),
            'content_name' => $this->faker->slug,
            'excerpt' => $this->faker->sentence
        ];
    }
}
