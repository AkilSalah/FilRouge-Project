<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Tag;
use App\Models\Theme;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $tagIds = Tag::pluck('id')->toArray();
        $themeIds = Theme::pluck('id')->toArray();
        $clientIds = Client::pluck('id')->toArray();

        return [
            'title' => $this->faker->word,
            'description' => $this->faker->paragraph,
            'image' => $this->faker->imageUrl(640, 480),
            'articleTags' => $this->faker->randomElements($tagIds, rand(1, 5)), 
            'theme_id' => $this->faker->randomElement($themeIds), 
            'client_id' => $this->faker->randomElement($clientIds), 
        ];
    }
}
