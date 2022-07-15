<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Hospital;
use App\Models\Psychologist;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    
    private function setLang() {
        if(session()->has('locale')) {
            app()->setLocale(session()->get('locale'));
        } else {
            app()->setLocale('en');
        }
    }

    public function article()
    {
        $this->setLang();
        $articles = Article::all();
        return view('admin.article.index', compact('articles'));
    }

    public function psychologist()
    {
        $this->setLang();
        $psychologists = Psychologist::all();
        return view('admin.psychologist.index', compact('psychologists'));
    }

    public function hospital()
    {
        $this->setLang();
        $hospitals = Hospital::all();
        return view('admin.hospital.index', compact('hospitals'));
    }
}
