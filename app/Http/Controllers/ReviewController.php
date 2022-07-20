<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Transaction;
use Illuminate\Http\Request;

class ReviewController extends Controller
{

    public function store(Request $request, $id)
    {
        $request->validate([
            'rating' => 'required|in:1,2,3,4,5',
            'comment' => 'required',
        ]);

        $transaction = Transaction::find($id);

        $review = new Review();
        $review->transaction_id = $transaction->id;
        $review->user_id = $transaction->user_id;
        $review->psychologist_id = $transaction->psychologist_id;
        $review->rating = $request->rating;
        $review->comment = $request->comment;
        $review->save();

        return redirect()->route('my_consultation', $id);
    }
}
