<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Transaction;
use App\Models\Psychologist;
use Illuminate\Http\Request;

class ReviewController extends Controller
{

    private function setLang() {
        if(session()->has('locale')) {
            app()->setLocale(session()->get('locale'));
        } else {
            app()->setLocale('en');
        }
    }


    public function index($id){
        $this->setLang();

        $reviews = Review::where('psychologist_id', $id)->get();
        $psychologist = Psychologist::find($id);

        return view('review.index', compact('reviews', 'psychologist'));
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'rating' => 'required|in:1,2,3,4,5',
            'comment' => 'required',
        ]);

        $transaction = Transaction::find($id);
        // store review
        $review = new Review();
        $review->transaction_id = $transaction->id;
        $review->user_id = $transaction->user_id;
        $review->psychologist_id = $transaction->psychologist_id;
        $review->rating = $request->rating;
        $review->comment = $request->comment;
        $review->save();

        // update psychologist rating mean
        $psychologist = Psychologist::find($transaction->psychologist_id);
        $psychologist->rating = ($psychologist->rating + $request->rating) / 2;
        $psychologist->save();

        return redirect()->route('my_consultation', $id);
    }
}
