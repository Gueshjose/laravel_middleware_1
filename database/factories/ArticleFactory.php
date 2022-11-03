<?php

namespace Database\Factories;

use App\Models\User;
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
    public function definition()
    {
        return [
            'title'=> $this->faker->realText($maxNbChars = 30, $indexSize = 1),
            'text'=>$this->faker->realTextBetween($minNbChars = 75, $maxNbChars = 120, $indexSize = 2),
            'user_id'=>User::inRandomOrder()->first()->id
        ];
    }
}
