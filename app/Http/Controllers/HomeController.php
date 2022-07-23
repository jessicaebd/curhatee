<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use App\Models\User;
use App\Models\Psychologist;
use App\Models\Forum;
use App\Models\Article;
use App\Models\PaymentType;
use App\Models\Schedule;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\ConsultationType;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

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
        if (Auth::check()) {
            if (Auth::user()->role == 'Admin') {

                $online_consultation_id = ConsultationType::where('name', 'Online Consultation')->first()->id;
                $offline_consultation_id = ConsultationType::where('name', 'Offline Consultation')->first()->id;
        
                $data = [
                    'users' => User::all(),
                    'payment_types' => PaymentType::all(),
                    'psychologists' => Psychologist::all(),
                    'schedules' => Schedule::all(),
                    'reviews' => Review::all(),
                    'articles' => Article::all(),
                    'forums' => Forum::all(),
                    'hospitals' => Hospital::all(),
                    'transactions' => Transaction::all(),
                    'transactions_all' => Transaction::orderBy('time', 'desc')->get(),
                    'transactions_pending' => Transaction::where('status', 'Pending')->orderBy('time', 'desc')->get(),
                    'transactions_confirmed' => Transaction::where('status', 'Confirmed')->orderBy('time', 'desc')->get(),
                    'transactions_finished' => Transaction::where('status', 'Finished')->orderBy('time', 'desc')->get(),
                    'transactions_rejected' => Transaction::where('status', 'Rejected')->orderBy('time', 'desc')->get(),
                    'online_consultation_id' => $online_consultation_id,
                    'transactions_online' => Transaction::where('consultation_type_id', $online_consultation_id)->orderBy('time', 'desc')->get(),
                    'offline_consultation_id' => $offline_consultation_id,
                    'transactions_offline' => Transaction::where('consultation_type_id', $offline_consultation_id)->orderBy('time', 'desc')->get(),
                ];

                return view('admin.dashboard', $data);
            }
            // elseif (Auth::user()->role == 'psychologist') {
            //     return redirect()->route('psychologist.index');
            // }
        }
        return view('home');
    }
}
