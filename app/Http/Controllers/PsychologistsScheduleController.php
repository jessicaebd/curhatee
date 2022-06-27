<?php

namespace App\Http\Controllers;

use App\Models\PsychologistsSchedule;
use App\Http\Requests\StorePsychologistsScheduleRequest;
use App\Http\Requests\UpdatePsychologistsScheduleRequest;

class PsychologistsScheduleController extends Controller
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
     * @param  \App\Http\Requests\StorePsychologistsScheduleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePsychologistsScheduleRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PsychologistsSchedule  $psychologistsSchedule
     * @return \Illuminate\Http\Response
     */
    public function show(PsychologistsSchedule $psychologistsSchedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PsychologistsSchedule  $psychologistsSchedule
     * @return \Illuminate\Http\Response
     */
    public function edit(PsychologistsSchedule $psychologistsSchedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePsychologistsScheduleRequest  $request
     * @param  \App\Models\PsychologistsSchedule  $psychologistsSchedule
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePsychologistsScheduleRequest $request, PsychologistsSchedule $psychologistsSchedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PsychologistsSchedule  $psychologistsSchedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(PsychologistsSchedule $psychologistsSchedule)
    {
        //
    }
}
