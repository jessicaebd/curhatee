<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PaymentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PaymentType::create([
            'type_name' => 'Credit Card',
        ]);

        PaymentType::create([
            'type_name' => 'Debit Card',
        ]);

        PaymentType::create([
            'type_name' => 'OVO',
        ]);

        PaymentType::create([
            'type_name' => 'GoPay',
        ]);

        PaymentType::create([
            'type_name' => 'ShopeePay',
        ]);
    }
}
