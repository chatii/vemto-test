<?php

namespace Database\Factories;

use App\Models\Comment;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'body' => $this->faker->text,
            'post_id' => \App\Models\Post::factory(),
            'comment_id' => function () {
                return \App\Models\Comment::factory()->create([
                    'comment_id' => null,
                ])->id;
            },
        ];
    }
}
