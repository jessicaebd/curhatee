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

        $transaction = Transaction::find($id);  

        if (Auth::guard('webpsychologist')->user()) {
            $data = [
                'transaction' => $transaction,
                'chats' => Chat::where('transaction_id', $transaction->id)->get(),
                'psychologist' => Psychologist::find($transaction->psychologist_id),
                'view' => 'Psychologist',
            ];
        } else if (auth()->user()) {
            $data = [
                'transaction' => $transaction,
                'chats' => Chat::where('transaction_id', $transaction->id)->get(),
                'view' => 'User',
            ];
        }

        return view('chat.index', $data);
    }

    public function store(Request $request, $id)
    {
        $transaction_id = $id;

        if (!$request->hasFile('image')) {
            if ($request->message == '') {
                return redirect()->back()->with('status', 'Please type message or upload image before sending');
            }
        }

        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg|max:10240',
        ]);

        $chat = new Chat();
        $chat->transaction_id = $transaction_id;

        if (Auth::guard('webpsychologist')->user()) {
            $chat->psychologist_id = Auth::guard('webpsychologist')->user()->id;
        } else if (auth()->user()) {
            $chat->user_id = auth()->user()->id;
        }

        $chat->message = $request->message;
        if ($request->hasFile('image')) {
            $ext_image = $request->image->getClientOriginalExtension();
            $name_image = "chat" . time() . "." . $ext_image;
            $request->image->storeAs('public/images/chat', $name_image);
            $chat->image = $name_image;
        }
        $chat->sent_at = Carbon::now();
        $chat->save();

        return redirect()->back();
    }

    public function showMessage($id)
    {
        $this->setLang();
        
        $transaction = Transaction::find($id);

        if (Auth::guard('webpsychologist')->user()) {
            $data = [
                'transaction' => $transaction,
                'chats' => Chat::where('transaction_id', $transaction->id)->get(),
                'psychologist' => Psychologist::find($transaction->psychologist_id),
                'view' => 'Psychologist',
            ];
        } else if (auth()->user()) {
            $data = [
                'transaction' => $transaction,
                'chats' => Chat::where('transaction_id', $transaction->id)->get(),
                'view' => 'User',
            ];
        }

        return view('chat.message', $data)->render();
    }
}
