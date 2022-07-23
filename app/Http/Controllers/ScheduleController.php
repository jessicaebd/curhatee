<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use App\Models\Schedule;
use Illuminate\Support\Str;
use App\Models\Psychologist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{

    private function setLang()
    {
        if (session()->has('locale')) {
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

        if (Auth::guard('webpsychologist')->user()) {
            $view = 'Psychologist';
        } else if (auth()->user()) {
            $view = 'User';
        }

        $data = [
            'psychologist' => Psychologist::findOrFail($id),
            'schedules' => Schedule::where('psychologist_id', $id)->get(),
            'schedules_time' => ['08:00:00', '09:00:00', '10:00:00', '11:00:00', '12:00:00', '13:00:00', '14:00:00', '15:00:00', '16:00:00'],
            'days' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
            'view' => $view,
        ];

        return view('admin.schedule.view', $data);
    }

    public function update($id)
    {
        $schedule = Schedule::findOrFail($id);
        $psychologist = Psychologist::findOrFail($schedule->psychologist_id);
        if ($schedule->isActive == true) {
            $schedule->isActive = false;
        } else {
            $schedule->isActive = true;
        }
        $schedule->save();
        if (Auth::guard('webpsychologist')->user() != null) {
            return redirect()->route('view_psychologist_schedule_psychologist', $psychologist->id)->withSuccess('schedule successfully updated!');
        } else {
            return redirect()->route('view_psychologist_schedule_admin', $psychologist->id)->withSuccess('schedule successfully updated!');
        }
    }
}
