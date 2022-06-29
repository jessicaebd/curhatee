<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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
