<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Chat;
use App\Models\Forum;
use App\Models\ReplyForum;
use App\Models\Psychologist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ForumController extends Controller
{
    private function setLang()
    {
        if (session()->has('locale')) {
            app()->setLocale(session()->get('locale'));
        } else {
            app()->setLocale('en');
        }
    }

    public function index()
    {
        $this->setLang();

        $forums = Forum::all();
        $view = 'User';

        if (Auth::guard('webpsychologist')->user()) {
            $view = 'Psychologist';
        }

        $data = [
            'forums' => $forums,
            'view' => $view,
        ];

        return view('forum.index', $data);
    }

    public function create(){
        $this->setLang();

        $view = 'User';

        if (Auth::guard('webpsychologist')->user()) {
            $view = 'Psychologist';
        }

        $data = [
            'view' => $view,
        ];

        return view('forum.add', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:10240',
        ]);

        $forum = new Forum();
        $forum->title = $request->title;
        $forum->content = $request->content;

        if (Auth::guard('webpsychologist')->user()) {
            $forum->psychologist_id = Auth::guard('webpsychologist')->user()->id;
        } else if (auth()->user()) {
            $forum->user_id = auth()->user()->id;
        }

        if ($request->hasFile('image')) {
            $ext_image = $request->image->getClientOriginalExtension();
            $name_image = "forum" . time() . "." . $ext_image;
            $request->image->storeAs('public/images/forum', $name_image);
            $forum->image = $name_image;
        }

        $forum->save();

        return redirect()->back();
    }

    public function show($id)
    {
        $this->setLang();

        $view = 'User';
        $forum = Forum::find($id);
        $reply_forums = ReplyForum::where('forum_id', $id)->get();

        if (Auth::guard('webpsychologist')->user()) {
            $view = 'Psychologist';
        }

        $data = [
            'forum' => $forum,
            'reply_forums' => $reply_forums,
            'view' => $view,
        ];

        return view('forum.show', $data);
    }

    public function storeReply($id){
        $forum_id = $id;

        $request->validate([
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:10240',
        ]);

        $reply_forum = new ReplyForum();
        $reply_forum->forum_id = $forum_id;
        $reply_forum->content = $request->content;

        if (Auth::guard('webpsychologist')->user()) {
            $reply_forum->psychologist_id = Auth::guard('webpsychologist')->user()->id;
        } else if (auth()->user()) {
            $reply_forum->user_id = auth()->user()->id;
        }

        if ($request->hasFile('image')) {
            $ext_image = $request->image->getClientOriginalExtension();
            $name_image = "reply-forum" . time() . "." . $ext_image;
            $request->image->storeAs('public/images/reply-forum', $name_image);
            $reply_forum->image = $name_image;
        }

        $reply_forum->save();

        return redirect()->back();
    }
}
