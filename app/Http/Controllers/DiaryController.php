<?php

namespace App\Http\Controllers;

use App\Models\Diary;
use App\Http\Requests\StoreDiaryRequest;
use App\Http\Requests\UpdateDiaryRequest;

class DiaryController extends Controller
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
     * @param  \App\Http\Requests\StoreDiaryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDiaryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Diary  $diary
     * @return \Illuminate\Http\Response
     */
    public function show(Diary $diary)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Diary  $diary
     * @return \Illuminate\Http\Response
     */
    public function edit(Diary $diary)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDiaryRequest  $request
     * @param  \App\Models\Diary  $diary
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDiaryRequest $request, Diary $diary)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Diary  $diary
     * @return \Illuminate\Http\Response
     */
    public function destroy(Diary $diary)
    {
        //
    }
}
