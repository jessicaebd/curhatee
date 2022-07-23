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
            ScheduleSeeder::class,
            ArticleSeeder::class,
            ReplyForumSeeder::class,    
            PaymentTypeSeeder::class,
            SubscriptionTypeSeeder::class,     
            SubscriptionSeeder::class,
            ConsultationTypeSeeder::class,
            TransactionSeeder::class,
            ReviewSeeder::class,
            PodcastSeeder::class,
            ChatSeeder::class,  
            LikedForumSeeder::class, 
            LikedReplyForumSeeder::class,  
        ]);
    }
}