<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            ArticleSeeder::class,
            DiarySeeder::class,
            ForumSeeder::class,
            HospitalSeeder::class,
            PaymentSeeder::class,
            PodcastSeeder::class,
            PsychologistSeeder::class,
            ReplyForumSeeder::class,
            ReviewSeeder::class,
            TransactionSeeder::class,
            SubscriptionSeeder::class,
            SubscriptionTypeSeeder::class,
        ]);
    }
}