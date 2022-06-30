<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Psychologist;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function article()
    {
        $articles = Article::all();
        return view('admin.article.index', compact('articles'));
    }

    public function psychologist()
    {
        $psychologists = Psychologist::all();
        return view('admin.psychologist.index', compact('psychologists'));
    }
}
