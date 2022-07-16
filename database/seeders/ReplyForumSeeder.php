<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Forum;
use App\Models\ReplyForum;
use Illuminate\Database\Seeder;

class ReplyForumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        ReplyForum::create([
            'user_id' => User::all()->random()->id,
            'forum_id' => Forum::all()->random()->id,
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates minima nulla incidunt. Veritatis doloremque beatae magnam molestias voluptatibus illo cupiditate sed omnis. Facilis maxime sed minima fugit, porro consectetur beatae?', 
            'like' => 30
        ]);

        ReplyForum::create([
            'user_id' => User::all()->random()->id,
            'forum_id' => Forum::all()->random()->id,
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates minima nulla incidunt. Veritatis doloremque beatae magnam molestias voluptatibus illo cupiditate sed omnis. Facilis maxime sed minima fugit, porro consectetur beatae?', 
            'like' => 30
        ]);

        ReplyForum::create([
            'user_id' => User::all()->random()->id,
            'forum_id' => Forum::all()->random()->id,
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates minima nulla incidunt. Veritatis doloremque beatae magnam molestias voluptatibus illo cupiditate sed omnis. Facilis maxime sed minima fugit, porro consectetur beatae?', 
            'like' => 30
        ]);

        ReplyForum::create([
            'user_id' => User::all()->random()->id,
            'forum_id' => Forum::all()->random()->id,
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates minima nulla incidunt. Veritatis doloremque beatae magnam molestias voluptatibus illo cupiditate sed omnis. Facilis maxime sed minima fugit, porro consectetur beatae?', 
            'like' => 30
        ]);

        ReplyForum::create([
            'user_id' => User::all()->random()->id,
            'forum_id' => Forum::all()->random()->id,
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates minima nulla incidunt. Veritatis doloremque beatae magnam molestias voluptatibus illo cupiditate sed omnis. Facilis maxime sed minima fugit, porro consectetur beatae?', 
            'like' => 30
        ]);

        ReplyForum::create([
            'user_id' => User::all()->random()->id,
            'forum_id' => Forum::all()->random()->id,
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates minima nulla incidunt. Veritatis doloremque beatae magnam molestias voluptatibus illo cupiditate sed omnis. Facilis maxime sed minima fugit, porro consectetur beatae?', 
            'like' => 30
        ]);

        ReplyForum::create([
            'user_id' => User::all()->random()->id,
            'forum_id' => Forum::all()->random()->id,
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates minima nulla incidunt. Veritatis doloremque beatae magnam molestias voluptatibus illo cupiditate sed omnis. Facilis maxime sed minima fugit, porro consectetur beatae?', 
            'like' => 30
        ]);

        ReplyForum::create([
            'user_id' => User::all()->random()->id,
            'forum_id' => Forum::all()->random()->id,
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates minima nulla incidunt. Veritatis doloremque beatae magnam molestias voluptatibus illo cupiditate sed omnis. Facilis maxime sed minima fugit, porro consectetur beatae?', 
            'like' => 30
        ]);

        ReplyForum::create([
            'user_id' => User::all()->random()->id,
            'forum_id' => Forum::all()->random()->id,
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates minima nulla incidunt. Veritatis doloremque beatae magnam molestias voluptatibus illo cupiditate sed omnis. Facilis maxime sed minima fugit, porro consectetur beatae?', 
            'like' => 30
        ]);
    }
}
