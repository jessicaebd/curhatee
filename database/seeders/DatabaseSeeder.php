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
            ArticleSeeder::class,
            ReplyForumSeeder::class,    
            PaymentTypeSeeder::class,
            SubscriptionTypeSeeder::class,     
            SubscriptionSeeder::class,
            TransactionSeeder::class,
            PodcastSeeder::class,
            ReviewSeeder::class,  
        ]);
    }
}
