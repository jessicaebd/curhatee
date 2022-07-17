<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\PaymentType;
use App\Models\Psychologist;
use App\Models\Schedule;
use App\Models\Transaction;
use App\Models\ConsultationType;
use Illuminate\Http\Request;

class ConsultationController extends Controller
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
        $psychologists = Psychologist::all();
        return view('consultation.index', compact('psychologists'));
    }

    public function show(Psychologist $psychologist)
    {
        $this->setLang();
        // generate schedule baru untuk yg sdh lewat
        $today = Carbon::today('Asia/Bangkok');
        Schedule::where('dateBook', '<', $today)->update(['status' => 'Open', 'dateBook' => null]);


        if (request('date')) {
            // ambil string
            $date_string = (request('date'));

            // convert ke date lagi
            $date = Carbon::createFromFormat('Y-m-d', $date_string);

            // ambil semua jam si dokter di hari yg dipilih
            $schedules = Schedule::where('psychologist_id', $psychologist->id)->Where('day', $date->format('l'))->get();

            // filter yg statusnya open
            // $schedules = $schedules->where('status', 'Open');   

            $payment_types = PaymentType::all();

            return view('consultation.show', compact('psychologist', 'date', 'schedules', 'payment_types'));
        }


        // ambil  hari ini
        $today = Carbon::today('Asia/Bangkok');

        return view('consultation.show', compact('psychologist', 'today'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'psychologist' => 'required|exists:psychologists,id',
            'schedule' => 'required|exists:schedules,id',
            'payment_type' => 'required|exists:payment_types,id',
        ]);


        // buat transaksi baru
        $transaction = new \App\Models\Transaction;
        $transaction->user_id = auth()->user()->id;
        $transaction->psychologist_id = $request->psychologist;
        $transaction->schedule_id = $request->schedule;
        $transaction->payment_type_id = $request->payment_type;

        $psychologist = Psychologist::find($request->psychologist);
        $transaction->price = $psychologist->fee;

        if ($request->submit == 'online-consultation') {
            $transaction->consultation_type_id = ConsultationType::where('name', 'Online Consultation')->first()->id;
        } else if ($request->submit == 'offline-consultation') {
            $transaction->consultation_type_id = ConsultationType::where('name', 'Offline Consultation')->first()->id;
        }

        $transaction->status = 'Pending';

        $schedule = Schedule::find($request->schedule);
        $startTime = Carbon::createFromFormat('Y-m-d H:i:s', $schedule->startTime)->format('H:i:s');
        $transaction->time = Carbon::createFromFormat('Y-m-d H:i:s', $request->date . ' ' . $startTime);

        $transaction->detail = 'tes aja dulu';
        $transaction->save();

        // ubah status schedule
        $schedule->status = 'Booked';
        $schedule->dateBook = $request->date;
        $schedule->save();

        return redirect('/')->with('status', 'Booking request success! Waiting for psychologist to confirm.');
    }

    public function update(Request $request)
    {
        $transaction = Transaction::find($request->transaction_id);
        $transaction->status = 'Confirmed';
        $transaction->save();

        return redirect('/psychologist')->with('status', 'Booking request accepted! The user will be notified');
    }

    // buat konsultasi yg udh dipesan
    public function my_index()
    {
        $this->setLang();
        $transactions = Transaction::where('user_id', auth()->user()->id)->get();
        $online_consultation_id = ConsultationType::where('name', 'Online Consultation')->first()->id;
        $offline_consultation_id = ConsultationType::where('name', 'Offline Consultation')->first()->id;
        return view('consultation.my_index', compact('transactions', 'online_consultation_id', 'offline_consultation_id'));
    }

    public function my_show(Transaction $transaction)
    {
        $this->setLang();
        return view('consultation.my_show', compact('transaction'));
    }
}
