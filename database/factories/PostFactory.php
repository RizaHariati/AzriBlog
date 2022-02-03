<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $paragraph = $this->faker->paragraph();
        $paragraphs = $this->faker->paragraphs(mt_rand(8, 10));
        return [
            'title' => $this->faker->words($nb = mt_rand(2, 4), $asText = true),
            'slug' => $this->faker->slug(),
            'is_featured' => $this->faker->boolean(),
            'user_id' => mt_rand(1, 5),
            'category_id' => mt_rand(1, 8),
            'excerpt' => implode(" ", [$paragraph]),
            'body' => "<div>" . implode("</div><div>", $paragraphs) . "</div>",

        ];
    }
}
