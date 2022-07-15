<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class HospitalController extends Controller
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
        return view('admin.hospital.index');
    }

    public function create()
    {
        $this->setLang();
        $hospitals = Hospital::all();
        return view('admin.hospital.add', compact('hospitals'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'contact' => 'required|numeric',
            'description' => 'required'
        ]);

        $hospital = new Hospital();
        $hospital->id = Str::uuid();
        $hospital->name = $request->name;
        $hospital->address = $request->address;
        $hospital->contact = $request->contact;
        $hospital->description = $request->description;

        if ($request->hasFile('image')) {
            $request->validate(
                ['image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10240'],
            );

            $destination_path = 'public/images/hospitals';
            $image = $request->file('image');
            $imageExt = $image->getClientOriginalExtension();
            $image_name = substr($hospital->id, 0, 8) . "-" . time() . "." . $imageExt;
            $path = $request->file('image')->storeAs($destination_path, $image_name);

            $hospital->image = $image_name;
        } else {
            $hospital->image = 'default-hospital.jpg';
        }

        $hospital->save();
        return redirect()->route('manage_hospital')->withSuccess('New hospital added!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $this->setLang();
        return view('admin.hospital.edit', ['hospital' => Hospital::findOrFail($id)]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'address' => 'required',
            'contact' => 'required|numeric',
            'description' => 'required'
        ]);

        $hospital = Hospital::findOrFail($id);
        $hospital->address = $request->address;
        $hospital->contact = $request->contact;
        $hospital->description = $request->description;

        if ($request->image !== NULL) {
            $request->validate(
                ['image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10240'],
            );

            $destination_path = 'public/images/hospitals';
            $image = $request->file('image');
            $imageExt = $image->getClientOriginalExtension();
            $image_name = substr($hospital->id, 0, 8) . "-" . time() . "." . $imageExt;
            $path = $request->file('image')->storeAs($destination_path, $image_name);

            $hospital->image = $image_name;
        }

        $hospital->save();
        return redirect()->route('manage_hospital')->withSuccess('Hospital successfully updated!');
    }

    public function destroy(Hospital $hospital)
    {
        $hospital->delete();
        return redirect()->route('manage_hospital')->withSuccess('Hospital successfully deleted!');
    }
}
