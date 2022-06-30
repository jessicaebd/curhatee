<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\PaymentType;
use App\Models\Psychologist;
use App\Models\PsychologistSchedule;
use App\Models\Schedule;
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

    public function detail(Psychologist $psychologist, Carbon $date) {
        $payment_types = PaymentType::all();
        return view('consultation.detail', compact('psychologist', 'date', 'payment_types'));
    }
}
