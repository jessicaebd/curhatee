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

    public function create()
    {
        $this->setLang();
        $schedules = Schedule::all();
        return view('admin.schedule.add', compact('schedules'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'contact' => 'required|numeric',
            'description' => 'required'
        ]);

        $schedule = new Schedule();
        $schedule->id = Str::uuid();
        $schedule->name = $request->name;
        $schedule->address = $request->address;
        $schedule->contact = $request->contact;
        $schedule->description = $request->description;

        if ($request->hasFile('image')) {
            $request->validate(
                ['image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10240'],
            );

            $destination_path = 'public/images/schedules';
            $image = $request->file('image');
            $imageExt = $image->getClientOriginalExtension();
            $image_name = substr($schedule->id, 0, 8) . "-" . time() . "." . $imageExt;
            $path = $request->file('image')->storeAs($destination_path, $image_name);

            $schedule->image = $image_name;
        } else {
            $schedule->image = 'default-schedule.jpg';
        }

        $schedule->save();
        return redirect()->route('manage_schedule')->withSuccess('New schedule added!');
    }

    public function show($id)
    {
        $this->setLang();
        $schedules = Schedule::all();
        return view(
            'admin.schedule.view',
            [
                'psychologist' => Psychologist::findOrFail($id),
                'schedules' => $schedules,
                'hospitals' => Hospital::all()
            ]
        );
    }

    public function edit($id)
    {
        $this->setLang();
        return view('admin.schedule.edit', ['schedule' => Schedule::findOrFail($id)]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'address' => 'required',
            'contact' => 'required|numeric',
            'description' => 'required'
        ]);

        $schedule = Schedule::findOrFail($id);
        $schedule->address = $request->address;
        $schedule->contact = $request->contact;
        $schedule->description = $request->description;

        if ($request->image !== NULL) {
            $request->validate(
                ['image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10240'],
            );

            $destination_path = 'public/images/schedules';
            $image = $request->file('image');
            $imageExt = $image->getClientOriginalExtension();
            $image_name = substr($schedule->id, 0, 8) . "-" . time() . "." . $imageExt;
            $path = $request->file('image')->storeAs($destination_path, $image_name);

            $schedule->image = $image_name;
        }

        $schedule->save();
        return redirect()->route('manage_schedule')->withSuccess('schedule successfully updated!');
    }

    public function destroy(Schedule $schedule)
    {
        $schedule->delete();
        return redirect()->route('manage_schedule')->withSuccess('schedule successfully deleted!');
    }
}
