<?php

namespace App\Http\Controllers;

use App\Models\PlanEarning;
use App\Http\Requests\StorePlanEarningRequest;
use App\Http\Requests\UpdatePlanEarningRequest;

class PlanEarningController extends Controller
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
     * @param  \App\Http\Requests\StorePlanEarningRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePlanEarningRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PlanEarning  $planEarning
     * @return \Illuminate\Http\Response
     */
    public function show(PlanEarning $planEarning)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PlanEarning  $planEarning
     * @return \Illuminate\Http\Response
     */
    public function edit(PlanEarning $planEarning)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePlanEarningRequest  $request
     * @param  \App\Models\PlanEarning  $planEarning
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePlanEarningRequest $request, PlanEarning $planEarning)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PlanEarning  $planEarning
     * @return \Illuminate\Http\Response
     */
    public function destroy(PlanEarning $planEarning)
    {
        //
    }
}
