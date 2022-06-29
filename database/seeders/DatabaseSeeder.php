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
            DiarySeeder::class,
            ForumSeeder::class,
            HospitalSeeder::class,
            PsychologistSeeder::class,
            PsychologistScheduleSeeder::class,
            PodcastSeeder::class,
            ArticleSeeder::class,
            ReplyForumSeeder::class,
            ReviewSeeder::class,   
            PaymentTypeSeeder::class,     
            SubscriptionSeeder::class,
            SubscriptionTypeSeeder::class,
            TransactionSeeder::class,
        ]);
    }
}
