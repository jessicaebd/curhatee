<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\PaymentType;
use App\Models\Psychologist;
use App\Models\Schedule;
use App\Models\Review;
use App\Models\Transaction;
use App\Models\ConsultationType;
use Illuminate\Http\Request;

class ConsultationController extends Controller
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
        $psychologists = Psychologist::all();
        return view('consultation.index', compact('psychologists'));
    }

    public function show(Psychologist $psychologist)
    {
        $this->setLang();
        // generate schedule baru untuk yg sdh lewat
        $today = Carbon::today('Asia/Bangkok');
        Schedule::where('dateBook', '<', $today)->update(['status' => 'Open', 'dateBook' => null]);

        $reviews = Review::where('psychologist_id', $psychologist->id)->orderBy('created_at', 'desc')->take(3)->get();

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

            return view('consultation.show', compact('psychologist', 'reviews', 'date', 'schedules', 'payment_types'));
        }


        // ambil  hari ini
        $today = Carbon::today('Asia/Bangkok');

        return view('consultation.show', compact('psychologist', 'reviews', 'today'));
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

        $transaction->save();

        // ubah status schedule
        $schedule->status = 'Confirmed';
        $schedule->dateBook = $request->date;
        $schedule->save();

        return redirect()->route('my_consultation')->with('status', 'Booking request success! Waiting for psychologist to confirm.');
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

        $transactions = Transaction::where('user_id', auth()->user()->id)->where('status', 'Pending')->orWhere('status', 'Confirmed')->get();

        foreach($transactions as $transaction){
            // if transaction schedule is over than today
            if(\Carbon\Carbon::createFromFormat('H:i:s', \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $transaction->time)->format('H:i:s'))->lte(\Carbon\Carbon::createFromFormat('H:i:s', \Carbon\Carbon::now('Asia/Bangkok')->format('H:i:s'))) ){
                // \Carbon\Carbon::createFromFormat('H:i:s', \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $transaction->time)->format('H:i:s'))->lte(\Carbon\Carbon::createFromFormat('H:i:s', \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', '2022-07-25 20:00:00')->format('H:i:s')))
                $transaction->status = 'Rejected';
                $transaction->note = 'Consultation ended because schedule time is missed or psychologist not confirmed the consultation';
                $transaction->save();
            }
        }

        $transaction_histories = Transaction::where('user_id', auth()->user()->id)->where('status', 'Finished')->orWhere('status', 'Rejected')->get();
        $online_consultation_id = ConsultationType::where('name', 'Online Consultation')->first()->id;
        $offline_consultation_id = ConsultationType::where('name', 'Offline Consultation')->first()->id;
        return view('consultation.my_index', compact('transactions', 'online_consultation_id', 'offline_consultation_id', 'transaction_histories'));
    }

    public function my_show(Transaction $transaction)
    {
        $this->setLang();
        return view('consultation.my_show', compact('transaction'));
    }

}
