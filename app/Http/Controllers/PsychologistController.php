<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use Illuminate\Support\Str;
use App\Models\Psychologist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PsychologistController extends Controller
{
    public function login()
    {
        return view('psychologist.login');
    }

    public function authenticate(Request $request)
    {
        if(Auth::guard('webpsychologist')
               ->attempt($request->only(['email', 'password'])))
        {
            return redirect()->route('admin.home');
        }
    }

    public function logout()
    {
        Auth::guard('webpsychologist')->logout();

        return redirect()->route('psychologist.login');
    }


    public function index()
    {
        return view('admin.psychologist.index');
    }

    public function create()
    {
        $hospitals = Hospital::all();
        return view('admin.psychologist.add', compact('hospitals'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'hospital_id' => 'required',
            'image' => 'required|file|image|mimes:jpg,jpeg,png|max:10240',
        ]);

        $psychologist = new Psychologist();
        $psychologist->id = Str::uuid();
        $psychologist->name = $request->name;
        $psychologist->email = $request->email;
        $psychologist->phone = $request->phone;
        $psychologist->password = bcrypt($request->name . '10');
        $psychologist->rating = $request->rating;
        $psychologist->fee = $request->fee;
        $psychologist->hospital_id = $request->hospital_id;
        $psychologist->description = 'I am a psychologist and I am available for your appointment.';

        $imageExt = $request->image->getClientOriginalExtension();
        $imageName = substr($psychologist->id, 0, 8) . "-" . time() . "." . $imageExt;

        $request->image->storeAs('public/psychologists/', $imageName);

        $psychologist->image = $imageName;
        $psychologist->save();

        return redirect()->route('manage_psychologist')->withSuccess('New psychologist added');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $hospitals = Hospital::all();
        return view(
            'admin.psychologist.edit',
            [
                'psychologist' => Psychologist::findOrFail($id),
                'hospitals' => $hospitals
            ]
        );
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'hospital_id' => 'required',
            'description' => 'required',
        ]);

        $psychologist = Psychologist::findOrFail($id);
        $psychologist->email = $request->email;
        $psychologist->phone = $request->phone;
        $psychologist->rating = $request->rating;
        $psychologist->fee = $request->fee;
        $psychologist->hospital_id = $request->hospital_id;
        $psychologist->description = $request->description;


        if ($request->image !== NULL) {
            $request->validate([
                'image' => 'required|file|image|mimes:jpg,jpeg,png|max:10240'
            ]);

            $imageExt = $request->image->getClientOriginalExtension();
            $imageName = substr($psychologist->id, 0, 8) . "-" . time() . "." . $imageExt;

            $request->image->storeAs('public/psychologists/', $imageName);
            $psychologist->image = $imageName;
        }

        $psychologist->save();

        return redirect()->route('manage_psychologist')->withSuccess('Succesfully updated psychologist data');
    }

    public function destroy(Psychologist $psychologist)
    {
        $psychologist->delete();
        return redirect()->route('manage_psychologist')->withSuccess('Psychologist successfully deleted');
    }
}
