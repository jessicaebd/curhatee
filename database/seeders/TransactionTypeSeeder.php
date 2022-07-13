<?php

namespace Database\Seeders;

use App\Models\TransactionType;
use Illuminate\Database\Seeder;

class TransactionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Transaction::create([
            'name' => 'Offline Consultation',
        ]);

        Transaction::create([
            'name' => 'Online Consultation',
        ]);
    }
}
