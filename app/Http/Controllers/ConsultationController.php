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

    public function show(Psychologist $psychologist) {
        return view('consultation.show', compact('psychologist'));
    }
}
