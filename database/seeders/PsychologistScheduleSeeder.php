<?php

namespace Database\Seeders;

use App\Models\Psychologist;
use App\Models\PsychologistSchedule;
use Illuminate\Database\Seeder;

class PsychologistScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        PsychologistSchedule::create([
            'psychologist_id' => Psychologist::all()->random()->id,
            'time' => '2022-03-19',
            'detail' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odio mollitia saepe cumque voluptatum reiciendis, fugit animi cupiditate exercitationem consequatur amet ipsum modi repudiandae repellat illo iusto aperiam dolorem, quae minima.'
        ]);

        PsychologistSchedule::create([
            'psychologist_id' => Psychologist::all()->random()->id,
            'time' => '2022-03-19',
            'detail' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odio mollitia saepe cumque voluptatum reiciendis, fugit animi cupiditate exercitationem consequatur amet ipsum modi repudiandae repellat illo iusto aperiam dolorem, quae minima.'
        ]);

        PsychologistSchedule::create([
            'psychologist_id' => Psychologist::all()->random()->id,
            'time' => '2022-03-18',
            'detail' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odio mollitia saepe cumque voluptatum reiciendis, fugit animi cupiditate exercitationem consequatur amet ipsum modi repudiandae repellat illo iusto aperiam dolorem, quae minima.'
        ]);
    }
}
