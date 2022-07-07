<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use App\Models\Transaction;
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
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        if(Auth::guard('webpsychologist')->attempt($request->only(['email', 'password'])))
        {
            return redirect('psychologist/');
        } else {
            return redirect('psychologist/login')->withErrors(['email' => 'These credentials do not match our records']);
        }
    }

    public function logout()
    {
        Auth::guard('webpsychologist')->logout();

        return redirect()->route('psychologist.login');
    }

    public function psychologist_index()
    {
        $psychologist = Auth::guard('webpsychologist')->user();
        $transactions = Transaction::where('psychologist_id', $psychologist->id)->get();
        return view('psychologist.index', compact('transactions'));
    }

    // controller admin
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

        $destination_path = 'public/psychologists';
        $image = $request->file('image');
        $imageExt = $image->getClientOriginalExtension();
        $image_name = substr($psychologist->id, 0, 8) . "-" . time() . "." . $imageExt;
        $path = $request->file('image')->storeAs($destination_path, $image_name);
        $psychologist->image = $image_name;

        $psychologist->save();
        return redirect()->route('manage_psychologist')->withSuccess('New psychologist added!');
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

            $destination_path = 'public/psychologists';
            $image = $request->file('image');
            $imageExt = $image->getClientOriginalExtension();
            $image_name = substr($psychologist->id, 0, 8) . "-" . time() . "." . $imageExt;
            $path = $request->file('image')->storeAs($destination_path, $image_name);
            $psychologist->image = $image_name;
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
