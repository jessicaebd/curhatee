<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Forum;
use Illuminate\Database\Seeder;

class ForumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Forum::create([
            'user_id' => User::all()->random()->id,
            'title' => 'How do we relate to objects? Looking for individuals who have difficulties with OCD &/or hoarding',
            'content' => 'I honestly do not believe that most people think of non-living things as being alive, or people, when they refer to them as She or Her etc. In the past, I\'ve done this with my car but I am fully aware it is neither alive nor a person. I\'d still do the survey though.',
            'likes' => 20
        ]);

        Forum::create([
            'user_id' => User::all()->random()->id,
            'title' => 'Forum 2',
            'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum amet cumque fuga laborum esse dolorem! Voluptatem, culpa ratione? Praesentium, accusantium voluptatum. Fuga laboriosam quam quas corrupti impedit dolorem ducimus quia!',
            'likes' => 60
        ]);

        Forum::create([
            'user_id' => User::all()->random()->id,
            'title' => 'Forum 3',
            'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum amet cumque fuga laborum esse dolorem! Voluptatem, culpa ratione? Praesentium, accusantium voluptatum. Fuga laboriosam quam quas corrupti impedit dolorem ducimus quia!',
            'likes' => 120
        ]);

        Forum::create([
            'user_id' => User::all()->random()->id,
            'title' => 'Forum 4',
            'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum amet cumque fuga laborum esse dolorem! Voluptatem, culpa ratione? Praesentium, accusantium voluptatum. Fuga laboriosam quam quas corrupti impedit dolorem ducimus quia!',
            'likes' => 220
        ]);
    }
}
