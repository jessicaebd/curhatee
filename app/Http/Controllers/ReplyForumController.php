<?php

namespace App\Http\Controllers;

use App\Models\ReplyForum;
use App\Http\Requests\StoreReplyForumRequest;
use App\Http\Requests\UpdateReplyForumRequest;

class ReplyForumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreReplyForumRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReplyForumRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReplyForum  $replyForum
     * @return \Illuminate\Http\Response
     */
    public function show(ReplyForum $replyForum)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReplyForum  $replyForum
     * @return \Illuminate\Http\Response
     */
    public function edit(ReplyForum $replyForum)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReplyForumRequest  $request
     * @param  \App\Models\ReplyForum  $replyForum
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReplyForumRequest $request, ReplyForum $replyForum)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReplyForum  $replyForum
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReplyForum $replyForum)
    {
        //
    }
}
