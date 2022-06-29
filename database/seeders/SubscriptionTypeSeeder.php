<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SubscriptionType;

class SubscriptionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SubscriptionType::create([
            'type_name' => 'Silver',
            'price' => 57000,
            'duration_months' => 1,
        ]);

        SubscriptionType::create([
            'type_name' => 'Gold',
            'price' => 307800,
            'duration_months' => 6,
        ]);

        SubscriptionType::create([
            'type_name' => 'Platinum',
            'price' => 615600,
            'duration_months' => 12,
        ]);
    }
}
