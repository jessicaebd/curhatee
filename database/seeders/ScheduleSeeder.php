<?php

namespace Database\Seeders;

use App\Models\Psychologist;
use App\Models\Schedule;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];

        $psychologists = Psychologist::all();
        foreach ($psychologists as $psychologist) {
            foreach ($days as $day) {
                for ($hour = 8; $hour < 17; $hour++) {
                    Schedule::create([
                        'psychologist_id' => $psychologist->id,
                        'day' => $day,
                        'dateBook' => null,
                        'startTime' => Carbon::parse('2022-02-02 ' .$hour . ':00:00'),
                        'endTime' => Carbon::parse('2022-02-02 ' . $hour+1 . ':00:00'),
                        'detail' => 'Schedule Detail',
                        'status' => 'Open',
                    ]);
                }
            }
        }

        // Schedule::create([
        //     'psychologist_id' => Psychologist::all()->random()->id,
        //     'time' => '2022-03-19',
        //     'detail' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odio mollitia saepe cumque voluptatum reiciendis, fugit animi cupiditate exercitationem consequatur amet ipsum modi repudiandae repellat illo iusto aperiam dolorem, quae minima.'
        // ]);

        // Schedule::create([
        //     'psychologist_id' => Psychologist::all()->random()->id,
        //     'time' => '2022-03-19',
        //     'detail' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odio mollitia saepe cumque voluptatum reiciendis, fugit animi cupiditate exercitationem consequatur amet ipsum modi repudiandae repellat illo iusto aperiam dolorem, quae minima.'
        // ]);

        // Schedule::create([
        //     'psychologist_id' => Psychologist::all()->random()->id,
        //     'time' => '2022-03-18',
        //     'detail' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odio mollitia saepe cumque voluptatum reiciendis, fugit animi cupiditate exercitationem consequatur amet ipsum modi repudiandae repellat illo iusto aperiam dolorem, quae minima.'
        // ]);
    }
}
