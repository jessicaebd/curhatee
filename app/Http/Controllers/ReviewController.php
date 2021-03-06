<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Transaction;
use App\Models\Psychologist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{

    private function setLang()
    {
        if (session()->has('locale')) {
            app()->setLocale(session()->get('locale'));
        } else {
            app()->setLocale('en');
        }
    }


    public function index($id)
    {
        $this->setLang();
        $psychologist = Psychologist::find($id);
        $reviews = Review::where('psychologist_id', $id)->get();

        $data = [
            'psychologist' => $psychologist,
            'reviews' => $reviews,
        ];

        return view('psychologist.review.index', $data);
    }

    public function store(Request $request, $id)
    {
        // dd($request->all());

        $request->validate([
            'stars' => 'required|in:1,2,3,4,5',
            'comment' => 'required',
        ]);

        $transaction = Transaction::find($id);
        // store review
        $review = new Review();
        $review->transaction_id = $transaction->id;
        $review->user_id = $transaction->user_id;
        $review->psychologist_id = $transaction->psychologist_id;
        $review->rating = $request->stars;
        $review->comment = $request->comment;
        $review->save();

        // update psychologist rating mean
        $psychologist = Psychologist::find($transaction->psychologist_id);
        $psychologist->rating = ($psychologist->rating + $request->stars) / 2;
        $psychologist->save();

        return redirect()->route('my_consultation', $id);
    }
}
