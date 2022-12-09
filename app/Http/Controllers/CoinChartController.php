<?php

namespace App\Http\Controllers;

use App\Models\CoinChart;
use App\Http\Requests\StoreCoinChartRequest;
use App\Http\Requests\UpdateCoinChartRequest;

class CoinChartController extends Controller
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
     * @param  \App\Http\Requests\StoreCoinChartRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCoinChartRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CoinChart  $coinChart
     * @return \Illuminate\Http\Response
     */
    public function show(CoinChart $coinChart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CoinChart  $coinChart
     * @return \Illuminate\Http\Response
     */
    public function edit(CoinChart $coinChart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCoinChartRequest  $request
     * @param  \App\Models\CoinChart  $coinChart
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCoinChartRequest $request, CoinChart $coinChart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CoinChart  $coinChart
     * @return \Illuminate\Http\Response
     */
    public function destroy(CoinChart $coinChart)
    {
        //
    }
}
