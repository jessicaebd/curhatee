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
            'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum amet cumque fuga laborum esse dolorem! Voluptatem, culpa ratione? Praesentium, accusantium voluptatum. Fuga laboriosam quam quas corrupti impedit dolorem ducimus quia!',
            'like' => 20
        ]);
    }
}
