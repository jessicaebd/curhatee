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

                $data = [
                    'users' => User::all(),
                    'payment_types' => PaymentType::all(),
                    'psychologists' => Psychologist::all(),
                    'schedules' => Schedule::all(),
                    'transactions' => Transaction::all(),
                    'reviews' => Review::all(),
                    'articles' => Article::all(),
                    'forums' => Forum::all(),
                    'hospitals' => Hospital::all(),
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
