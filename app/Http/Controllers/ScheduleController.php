<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use App\Models\Schedule;
use Illuminate\Support\Str;
use App\Models\Psychologist;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{

    private function setLang() {
        if(session()->has('locale')) {
            app()->setLocale(session()->get('locale'));
        } else {
            app()->setLocale('en');
        }
    }

    public function index()
    {
        $this->setLang();

        return view('admin.schedule.index');
    }

    public function show($id)
    {
        $this->setLang();

        $data = [
            'psychologist' => Psychologist::findOrFail($id),
            'schedules' => Schedule::where('psychologist_id', $id)->get(),
            'schedules_time' => ['09:00:00','10:00:00','11:00:00','12:00:00','13:00:00','14:00:00','15:00:00','16:00:00','17:00:00'],
            'days' => ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'],
        ];

        return view('admin.schedule.view', $data);
    }

    public function update( $id)
    {
        $schedule = Schedule::findOrFail($id);
        $psychologist = Psychologist::findOrFail($schedule->psychologist_id);
        if($schedule->isActive == true) {
            $schedule->isActive = false;
        } else {
            $schedule->isActive = true;
        }
        $schedule->save();
        return redirect()->route('view_psychologist_schedule', $psychologist->id)->withSuccess('schedule successfully updated!');
    }

}
