<?php

namespace Database\Seeders;

use App\Models\ConsultationType;
use Illuminate\Database\Seeder;

class ConsultationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ConsultationType::create([
            'name' => 'Offline Consultation',
        ]);

        ConsultationType::create([
            'name' => 'Online Consultation',
        ]);
    }
}
