<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\PaymentType;
use App\Models\Psychologist;
use App\Models\PsychologistSchedule;
use App\Models\Schedule;
use App\Models\Transaction;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    public function index()
    {
        $psychologists = Psychologist::all();
        return view('consultation.index', compact('psychologists'));
    }

    public function show(Psychologist $psychologist) 
    {
        if(request('date')) {
            // ambil string
            $date_string = (request('date'));
            // convert ke date lagi
            $date = Carbon::createFromFormat('Y-m-d', $date_string); 

            // ambil semua jam si dokter di hari yg dipilih
            $schedules = Schedule::where('psychologist_id', $psychologist->id)->Where('day', $date->format('l'))->get();

            $payment_types = PaymentType::all();

            return view('consultation.show', compact('psychologist', 'date', 'schedules', 'payment_types'));
        }


        // ambil  hari ini
        $today = Carbon::today('Asia/Bangkok');

        return view('consultation.show', compact('psychologist', 'today'));
    }

    public function store(Request $request) {
        $request->validate([
            'date' => 'required|date',
            'psychologist' => 'required|exists:psychologists,id',
            'schedule' => 'required|exists:schedules,id',
            'payment_type' => 'required|exists:payment_types,id',
        ]);

        // buat transaksi baru
        $transaction = new \App\Models\Transaction;
        $transaction->user_id = auth()->user()->id;
        $transaction->schedule_id = $request->schedule;
        $transaction->payment_type_id = $request->payment_type;

        $psychologist = Psychologist::find($request->psychologist);
        $transaction->price = $psychologist->fee;

        $transaction->status = 'Pending';

        $schedule = Schedule::find($request->schedule);
        $startTime = Carbon::createFromFormat('Y-m-d H:i:s', $schedule->startTime)->format('H:i:s');
        $transaction->time = Carbon::createFromFormat('Y-m-d H:i:s', $request->date . ' ' . $startTime);

        $transaction->detail = 'tes aja dulu';
        $transaction->save();

        return redirect('/')->with('status', 'Pemesanan berhasil');
    }

    // buat konsultasi yg udh dipesan
    public function my_index () {
        $transactions = Transaction::where('user_id', auth()->user()->id)->get();
        return view('consultation.my_index', compact('transactions'));
    }

}
