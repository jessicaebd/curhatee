<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Chat;
use App\Models\User;
use App\Models\Forum;
use App\Models\Review;
use App\Models\LikedForum;
use App\Models\ReplyForum;
use App\Models\Psychologist;
use Illuminate\Http\Request;
use App\Models\LikedReplyForum;
use App\Http\Controllers\Controller;
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

        $forums = Forum::orderBy('likes', 'desc')->get();
        $view = 'User';

        if (Auth::guard('webpsychologist')->user()) {
            $view = 'Psychologist';
        }

        if (Auth::check()) {
            if (Auth::user()->role == 'Admin') {
                $view = 'Admin';
            }
        }

        foreach ($forums as $forum) {
            $forum->is_forum_liked = false;
            if (Auth::guard('webpsychologist')->user()) {
                $forum->is_forum_liked = LikedForum::where('forum_id', $forum->id)->where('psychologist_id', Auth::guard('webpsychologist')->user()->id)->first();
            } else if (auth()->user()) {
                $forum->is_forum_liked = LikedForum::where('forum_id', $forum->id)->where('user_id', auth()->user()->id)->first();
            }

            if ($forum->is_forum_liked) {
                $forum->is_forum_liked = true;
            } else {
                $forum->is_forum_liked = false;
            }
        }

        $data = [
            'forums' => $forums,
            'view' => $view,
        ];

        if (Auth::guard('webpsychologist')->user()) {
            $data['psychologist'] = Psychologist::find(Auth::guard('webpsychologist')->user()->id);
        };

        return view('forum.index', $data);
    }

    public function create()
    {
        $this->setLang();

        $view = 'User';

        if (Auth::guard('webpsychologist')->user()) {
            $view = 'Psychologist';
        }

        $data = [
            'view' => $view,
        ];

        if (Auth::guard('webpsychologist')->user()) {
            $data['psychologist'] = Psychologist::find(Auth::guard('webpsychologist')->user()->id);
        };

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

        $forum->created_at = Carbon::now('Asia/Bangkok');

        $forum->save();

        return redirect()->route('forum_page');
    }

    public function show($id)
    {
        $this->setLang();

        $view = 'User';
        $forum = Forum::find($id);
        $reply_forums = ReplyForum::where('forum_id', $id)->orderBy('likes', 'desc')->get();
        $is_forum_liked = false;



        if (Auth::guard('webpsychologist')->user()) {
            $view = 'Psychologist';
            $is_forum_liked = LikedForum::where('forum_id', $id)->where('psychologist_id', Auth::guard('webpsychologist')->user()->id)->first();
        } else if (auth()->user()) {
            $view = 'User';
            $is_forum_liked = LikedForum::where('forum_id', $id)->where('user_id', auth()->user()->id)->first();
        }

        if (Auth::check()) {
            if (Auth::user()->role == 'Admin') {
                $view = 'Admin';
            }
        }

        if ($is_forum_liked) {
            $forum->is_forum_liked = true;
        } else {
            $forum->is_forum_liked = false;
        }

        foreach ($reply_forums as $reply_forum) {
            $reply_forum->is_reply_forum_liked = false;
            if (Auth::guard('webpsychologist')->user()) {
                $reply_forum->is_reply_forum_liked = LikedReplyForum::where('reply_forum_id', $reply_forum->id)->where('psychologist_id', Auth::guard('webpsychologist')->user()->id)->first();
            } else if (auth()->user()) {
                $reply_forum->is_reply_forum_liked = LikedReplyForum::where('reply_forum_id', $reply_forum->id)->where('user_id', auth()->user()->id)->first();
            }

            if ($reply_forum->is_reply_forum_liked) {
                $reply_forum->is_reply_forum_liked = true;
            } else {
                $reply_forum->is_reply_forum_liked = false;
            }
        }

        $data = [
            'forum' => $forum,
            'reply_forums' => $reply_forums,
            'view' => $view,
        ];

        if (Auth::guard('webpsychologist')->user()) {
            $data['psychologist'] = Psychologist::find(Auth::guard('webpsychologist')->user()->id);
        };

        // if (Auth::check()) {
        //     if (Auth::user()->role == 'Admin') {
        //         return view('admin.forum.show', $data);
        //     }
        // }

        return view('forum.show', $data);
    }

    public function storeReply(Request $request, $id)
    {
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

        $reply_forum->created_at = Carbon::now('Asia/Bangkok');

        $reply_forum->save();

        return redirect()->back();
    }

    public function likeForum($id)
    {
        if (Auth::guard('webpsychologist')->user()) {
            $person = Auth::guard('webpsychologist')->user();
            $person_type = 'psychologist';
        } else if (auth()->user()) {
            $person = auth()->user();
            $person_type = 'user';
        }

        $forum = Forum::find($id);

        $is_liked = LikedForum::where('forum_id', $forum->id)->where($person_type . '_id', $person->id)->first();

        if ($is_liked == null) {
            $like = new LikedForum();
            $like->forum_id = $id;
            if ($person_type == 'psychologist') {
                $like->psychologist_id = $person->id;
            } else if ($person_type == 'user') {
                $like->user_id = $person->id;
            }
            $like->save();

            $forum->likes = $forum->likes + 1;
            $forum->save();
        } else {
            $forum->likes = $forum->likes - 1;
            $forum->save();
            $is_liked->delete();
        }

        return redirect()->back();
    }

    public function likeReplyForum($id)
    {
        if (Auth::guard('webpsychologist')->user()) {
            $person = Auth::guard('webpsychologist')->user();
            $person_type = 'psychologist';
        } else if (auth()->user()) {
            $person = auth()->user();
            $person_type = 'user';
        }

        $reply_forum = ReplyForum::find($id);

        $is_liked = LikedReplyForum::where('reply_forum_id', $reply_forum->id)->where($person_type . '_id', $person->id)->first();

        if ($is_liked == null) {
            $like = new LikedReplyForum();
            $like->reply_forum_id = $id;
            if ($person_type == 'psychologist') {
                $like->psychologist_id = $person->id;
            } else if ($person_type == 'user') {
                $like->user_id = $person->id;
            }
            $like->save();

            $reply_forum->likes = $reply_forum->likes + 1;
            $reply_forum->save();
        } else {
            $reply_forum->likes = $reply_forum->likes - 1;
            $reply_forum->save();
            $is_liked->delete();
        }

        return redirect()->back();
    }

    public function deleteForum($id)
    {
        $forum = Forum::find($id);

        $like_forums = LikedForum::where('forum_id', $id)->get();
        foreach ($like_forums as $like_forum) {
            $like_forum->delete();
        }

        $reply_forums = ReplyForum::where('forum_id', $id)->get();
        foreach ($reply_forums as $reply_forum) {
            $like_reply_forums = LikedReplyForum::where('reply_forum_id', $reply_forum->id)->get();
            foreach ($like_reply_forums as $like_reply_forum) {
                $like_reply_forum->delete();
            }
            $reply_forum->delete();
        }

        $forum->delete();

        return redirect()->route('forum_page');
    }

    public function deleteReplyForum($id)
    {
        $reply_forum = ReplyForum::find($id);

        $like_reply_forums = LikedReplyForum::where('reply_forum_id', $id)->get();
        foreach ($like_reply_forums as $like_reply_forum) {
            $like_reply_forum->delete();
        }

        $reply_forum->delete();

        return redirect()->route('show_detail_forum', $id);
    }
}
