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
        $theme = Theme::inRandomOrder()->first();

        $tagIds = $theme->tag()->pluck('id')->toArray();

        return [
            'title' => $this->faker->word,
            'description' => $this->faker->paragraph,
            'image' => $this->faker->imageUrl(640, 480),
            'theme_id' => $theme->id, 
            'client_id' => Client::inRandomOrder()->first()->id, 
            'articleTags' =>json_encode($this->faker->randomElements($tagIds, rand(1, count($tagIds)))) , 
        ];
    }
}
