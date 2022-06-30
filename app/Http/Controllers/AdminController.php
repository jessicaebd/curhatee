<?php

namespace App\Http\Controllers;

use App\Models\Article;
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
}
