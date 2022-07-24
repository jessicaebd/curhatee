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
            'content' => 'Hang in there. Do call a helpline.',
            'likes' => 3
        ]);

        ReplyForum::create([
            'user_id' => User::all()->random()->id,
            'forum_id' => Forum::all()->random()->id,
            'content' => 'hello and welcome. Please don’t give up, talk to us, the forum may help',
            'likes' => 30
        ]);

        ReplyForum::create([
            'user_id' => User::all()->random()->id,
            'forum_id' => Forum::all()->random()->id,
            'content' => '<p>I am so sorry that your struggling right now.</p><br>
            <p>We at the Mental Health Forum, try our best to support and help each other.</p>
            <p>With that being said, I hope you will come here often, to receive support and help.</p>',
            'likes' => 10
        ]);

        ReplyForum::create([
            'user_id' => User::all()->random()->id,
            'forum_id' => Forum::all()->random()->id,
            'content' => '<p>you can do something called a peer mentoring course</p>
            <p>your local mental health services
            should be able to tell you how to apply</p>',
            'likes' => 50
        ]);

        ReplyForum::create([
            'user_id' => User::all()->random()->id,
            'forum_id' => Forum::all()->random()->id,
            'content' => 'Talk to your therapist or psychiatrist about this, you may need medication',
            'likes' => 30
        ]);

        ReplyForum::create([
            'user_id' => User::all()->random()->id,
            'forum_id' => Forum::all()->random()->id,
            'content' => 'Have you tried therapy?
            If you have not, it might be something to think about.
            Just a thought.',
            'likes' => 35
        ]);

        ReplyForum::create([
            'user_id' => User::all()->random()->id,
            'forum_id' => Forum::all()->random()->id,
            'content' => '<p>I am so sorry to here this.</p> 
            <p>Maybe talk to your dr, about this.</p>',
            'likes' => 5
        ]);

        ReplyForum::create([
            'user_id' => User::all()->random()->id,
            'forum_id' => Forum::all()->random()->id,
            'content' => 'Try not to worry or force yourself to remember anything. Try and stay present with what is.',
            'likes' => 50
        ]);

        ReplyForum::create([
            'user_id' => User::all()->random()->id,
            'forum_id' => Forum::all()->random()->id,
            'content' => 'Find a hobby or two to try out. Even if it is just reading a book. I love jigsaws. Just a case of finding that one thing you would love to do.',
            'likes' => 20
        ]);

        ReplyForum::create([
            'user_id' => User::all()->random()->id,
            'forum_id' => Forum::all()->random()->id,
            'content' => 'I think many to most people feel this way. Certainly there are many prison-like aspects to our reality. Most just try to make the best of it. I’m sorry it’s getting you down.',
            'likes' => 25
        ]);
    }
}
