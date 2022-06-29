<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\PaymentType;
use App\Models\Subscription;
use Illuminate\Database\Seeder;
use App\Models\SubscriptionType;

class SubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subscription::create([
            'user_id' => User::all()->random()->id,
            'subscription_type_id' => SubscriptionType::all()->random()->id,
            'payment_type_id' => PaymentType::all()->random()->id,
            'activation_date' => '2022-08-27',
        ]);

        Subscription::create([
            'user_id' => User::all()->random()->id,
            'subscription_type_id' => SubscriptionType::all()->random()->id,
            'payment_type_id' => PaymentType::all()->random()->id,
            'activation_date' => '2022-06-30',
        ]);

        Subscription::create([
            'user_id' => User::all()->random()->id,
            'subscription_type_id' => SubscriptionType::all()->random()->id,
            'payment_type_id' => PaymentType::all()->random()->id,
            'activation_date' => '2022-07-11',
        ]);
    }
}
