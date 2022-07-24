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
            "name" => "Admin1",
            "email" => "admin1@gmail.com",
            "password" => bcrypt("password"),
            "role" => "Admin",
            "phone" => "082111469005",
            "image" => "user-profile.jpg",
            "subscription_status" => "invalid",
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);

        User::create([
            "name" => "Admin2",
            "email" => "admin2@gmail.com",
            "password" => bcrypt("password"),
            "role" => "Admin",
            "phone" => "081232387449",
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
            "name" => "User Valid1",
            "email" => "uservalid1@gmail.com",
            "password" => bcrypt("password"),
            "role" => "User",
            "phone" => "082170094970",
            "image" => "user-profile.jpg",
            "subscription_status" => "valid",
            "expiry_date" => "2022-12-21",
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);

        User::create([
            "name" => "User Valid2",
            "email" => "uservalid2@gmail.com",
            "password" => bcrypt("password"),
            "role" => "User",
            "phone" => "081234337912",
            "image" => "user-profile.jpg",
            "subscription_status" => "valid",
            "expiry_date" => "2022-12-23",
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);

        User::create([
            "name" => "User Valid3",
            "email" => "uservalid3@gmail.com",
            "password" => bcrypt("password"),
            "role" => "User",
            "phone" => "082150038379",
            "image" => "user-profile.jpg",
            "subscription_status" => "valid",
            "expiry_date" => "2022-11-11",
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

        User::create([
            "name" => "User Invalid1",
            "email" => "userinvalid1@gmail.com",
            "password" => bcrypt("password"),
            "role" => "User",
            "phone" => "081234765902",
            "image" => "user-profile.jpg",
            "subscription_status" => "invalid",
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);

        User::create([
            "name" => "User Invalid2",
            "email" => "userinvalid2@gmail.com",
            "password" => bcrypt("password"),
            "role" => "User",
            "phone" => "082183740283",
            "image" => "user-profile.jpg",
            "subscription_status" => "invalid",
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);

        User::factory(10)->create();
    }
}
