<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "name" => "Admin",
            "email" => "admin@gmail.com",
            "password" => bcrypt("password"),
            "role" => "Admin",
            "phone" => "089613468804",
            "image" => "user-profile.jpg",
            "subscription_status" => "invalid",
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);

        User::create([
            "name" => "User Valid",
            "email" => "uservalid@gmail.com",
            "password" => bcrypt("password"),
            "role" => "User",
            "phone" => "089612368874",
            "image" => "user-profile.jpg",
            "subscription_status" => "valid",
            "expiry_date" => "2022-12-12",
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);

        User::create([
            "name" => "User Invalid",
            "email" => "userinvalid@gmail.com",
            "password" => bcrypt("password"),
            "role" => "User",
            "phone" => "089689011801",
            "image" => "user-profile.jpg",
            "subscription_status" => "invalid",
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);

        User::factory(10)->create();
    }
}
