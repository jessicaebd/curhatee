<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Hospital;
use App\Models\Transaction;
use App\Models\Schedule;
use Illuminate\Support\Str;
use App\Models\Psychologist;
use App\Models\ConsultationType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PsychologistController extends Controller
{
    // public function dashboard()
    // {
    //     $psychologists = Psychologist::all();
    //     return view('psychologist.dashboard');
    // }


    private function setLang() {
        if(session()->has('locale')) {
            app()->setLocale(session()->get('locale'));
        } else {
            app()->setLocale('en');
        }
    }

    public function login()
    {
        $this->setLang();

        return view('psychologist.login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::guard('webpsychologist')->attempt($request->only(['email', 'password']))) {
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
        $this->setLang();
        $psychologist = Auth::guard('webpsychologist')->user();
        // $transactions_all = Transaction::where('psychologist_id', $psychologist->id)->where(\Carbon\Carbon::createFromFormat('H:i:s', \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $transaction->time)->format('Y-m-d')), '>', (\Carbon\Carbon::createFromFormat('H:i:s', \Carbon\Carbon::now('Asia/Bangkok')->format('Y-m-d'))))->orderBy('time', 'desc')->get();

        $transactions_all = Transaction::where('psychologist_id', $psychologist->id)->where('time', '>=', now())->orderBy('time', 'asc')->get();

        $transactions_pending = Transaction::where('psychologist_id', $psychologist->id)->where('status', 'Pending')->orderBy('time', 'asc')->get();
        $transactions_confirmed = Transaction::where('psychologist_id', $psychologist->id)->where('status', 'Confirmed')->orderBy('time', 'asc')->get();
        $transactions_finished = Transaction::where('psychologist_id', $psychologist->id)->where('status', 'Finished')->orderBy('time', 'asc')->get();
        $transactions_rejected = Transaction::where('psychologist_id', $psychologist->id)->where('status', 'Rejected')->orderBy('time', 'asc')->get();
        $online_consultation_id = ConsultationType::where('name', 'Online Consultation')->first()->id;
        $offline_consultation_id = ConsultationType::where('name', 'Offline Consultation')->first()->id;
        return view('psychologist.dashboard', compact('psychologist', 'transactions_all', 'transactions_pending', 'transactions_confirmed', 'transactions_pending', 'transactions_finished', 'transactions_rejected', 'online_consultation_id', 'offline_consultation_id'));
    }

    public function psychologist_show(Transaction $transaction)
    {
        $this->setLang();
        $psychologist = Auth::guard('webpsychologist')->user();
        return view('psychologist.show', compact('psychologist', 'transaction'));
    }

    public function psychologist_update_accept(Transaction $transaction)
    {
        $transaction->status = 'Confirmed';
        $transaction->save();
        $psychologist = Auth::guard('webpsychologist')->user();
        return view('psychologist.show', compact('psychologist', 'transaction'))->with('status', 'Consultation confirmed');
    }

    public function psychologist_update_reject(Transaction $transaction)
    {
        $transaction->status = 'Rejected';
        $transaction->note = 'Consultation rejected by psychologist';
        $transaction->save();
        $psychologist = Auth::guard('webpsychologist')->user();
        return view('psychologist.show', compact('psychologist', 'transaction'))->with('status', 'Consultation rejected');
    }

    public function psychologist_end(Request $request, Transaction $transaction)
    {
        $transaction->status = 'Finished';
        if($request->has('note')) {
            $transaction->note = $request->note;
        }
        $transaction->save();
        return redirect()->route('psychologist_dashboard');
    }


    // controller admin
    public function index()
    {
        $this->setLang();
        return view('admin.psychologist.index');
    }

    public function create()
    {
        $this->setLang();
        $hospitals = Hospital::all();
        return view('admin.psychologist.add', compact('hospitals'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:psychologists',
            'phone' => 'required|numeric',
            'hospital_id' => 'required',
            'image' => 'required|file|image|mimes:jpg,jpeg,png|max:10240',
        ]);

        $psychologist = new Psychologist();
        $psychologist->name = $request->name;
        $psychologist->email = $request->email;
        $psychologist->phone = $request->phone;
        $psychologist->password = bcrypt($request->name . '10');
        $psychologist->rating = $request->rating;
        $psychologist->fee = $request->fee;
        $psychologist->hospital_id = $request->hospital_id;
        $psychologist->description = 'I am a psychologist and I am available for your appointment.';

        $destination_path = 'public/images/psychologists';
        $image = $request->file('image');
        $imageExt = $image->getClientOriginalExtension();
        $image_name = substr($psychologist->id, 0, 8) . "-" . time() . "." . $imageExt;
        $path = $request->file('image')->storeAs($destination_path, $image_name);
        $psychologist->image = $image_name;

        $psychologist->save();

        // Make schedules
        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
        $psychologist_id = Psychologist::where('email', $request->email)->first()->id;
        foreach ($days as $day) {
            // dd($day);
            for ($hour = 8; $hour < 17; $hour++) {
                Schedule::create([
                    'psychologist_id' => $psychologist_id,
                    'day' => $day,
                    'dateBook' => null,
                    'startTime' => Carbon::parse('2022-02-02 ' .$hour . ':00:00'),
                    'endTime' => Carbon::parse('2022-02-02 ' . $hour+1 . ':00:00'),
                    'detail' => 'Schedule Detail',
                    'status' => 'Open',
                    'isActive' => true,
                ]);
            }
        }

        return redirect()->route('manage_psychologist')->withSuccess('New psychologist added!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $this->setLang();
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
