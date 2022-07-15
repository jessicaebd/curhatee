<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        if (Auth::check()) {
            if (Auth::user()->role == 'Admin') {
                return view('admin.dashboard');
            }
            // elseif (Auth::user()->role == 'psychologist') {
            //     return redirect()->route('psychologist.index');
            // }
        }
        return view('home');
    }

    public function article()
    {
        return view('article');
    }

    public function video()
    {
        return view('video');
    }
}
