<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Chat;
use App\Models\Psychologist;
use App\Models\PaymentType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function indexUser($id)
    {
        $data = [
            'user' => auth()->user(),
            'psychologist' => Psychologist::find($id),
            'chats' => Chat::where('psychologist_id', $id)->where('user_id', auth()->user()->id)->get(),
            'payment_types' => PaymentType::all(),
        ];

        return view('chat.index', $data);
    }

    public function chatForUser(){

    }

    public function indexPyschologist($id)
    {

        $data = [
            'user' => User::find($id),
            'psychologist' => Auth::guard('webpsychologist')->user(),
            'chats' => Chat::where('psychologist_id', $id)->where('user_id', $id)->get(),
        ];

        return view('psychologist.chat', $data);
    }

    public function showChat($id){
        $data = [
            'user' => auth()->user(),
            'psychologist' => Psychologist::find($id),
            'chats' => Chat::where('psychologist_id', $id)->where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->get(),
        ];

        return view('chat.index', $data);
    }

    public function storeChatUser($id, Request $request){
        $request->validate([
            'message' => 'required',
        ]);

        $chat = new Chat;
        $chat->user_id = auth()->user()->id;
        $chat->psychologist_id = $id;
        $chat->message = request('message');
        $chat->trasaction_id = request('trasaction_id');
        $chat->sent_at = Carbon::now();
        $chat->save();
    }
}
