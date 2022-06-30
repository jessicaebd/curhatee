<?php

namespace App\Http\Controllers;

use App\Models\Psychologist;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    public function index()
    {
        $psychologists = Psychologist::all();
        return view('consultation.index', compact('psychologists'));
    }

    public function show() {
        return view('consultation.show');
    }
}
