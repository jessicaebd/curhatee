<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Chat;
use App\Models\Transaction;
use App\Models\Psychologist;
use App\Models\PaymentType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index($transactionId)
    {
        // dd($transactionId);
        $transaction = Transaction::find($transactionId);
// dd($transaction);
        $data = [
            'transaction' => $transaction,
            'chats' => Chat::where('transaction_id', $transaction->id)->where('psychologist_id', $transaction->psychologist->id)->where('user_id', $transaction->user->id)->get(),
        ];

        return view('chat.index', $data);
    }

    public function store(Request $request, $transactionId)
    {
        if (!$request->hasFile('image')) {
            if ($request->message == '') {
                return redirect()->back()->with('status', 'Please type message or upload image before sending');
            }
        }

        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg|max:10240',
        ]);

        $transaction = Transaction::find($transactionId);

        $chat = new Chat();
        $chat->transaction_id = $transaction->id;
        $chat->psychologist_id = $transaction->psychologist->id;
        $chat->user_id = $transaction->user->id;
        $chat->message = $request->message;
        if ($request->hasFile('image')) {
            $extImage = $request->image->getClientOriginalExtension();
            $nameImage = "realEstate" . time() . "." . $extImage;
            $request->image->storeAs('public/images/chat', $nameImage);
            $chat->image = $nameImage;
        }
        $chat->sent_at = Carbon::now();
        $chat->save();

        $data = [
            'transaction' => $transaction,
            'user' => $transaction->user->id,
            'psychologist' => $transaction->psychologist->id,
            'chats' => Chat::where('transaction_id', $transaction->id)->where('psychologist_id', $transaction->psychologist->id)->where('user_id', $transaction->user->id)->get(),
        ];
        return view('chat.index', $data);
    }
}
