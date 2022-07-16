<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function show($id)
    {
        $reviews = Review::where('psychologist_id', $id)->get();

        $data = [
            'reviews' => $reviews,
        ];

        // return view('review.show', $data);
    }

    public function store($id)
    {
    }
}
