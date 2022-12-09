<?php

namespace App\Http\Controllers;

use App\Models\Explorer;
use App\Http\Requests\StoreExplorerRequest;
use App\Http\Requests\UpdateExplorerRequest;

class ExplorerController extends Controller
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
     * @param  \App\Http\Requests\StoreExplorerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExplorerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Explorer  $explorer
     * @return \Illuminate\Http\Response
     */
    public function show(Explorer $explorer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Explorer  $explorer
     * @return \Illuminate\Http\Response
     */
    public function edit(Explorer $explorer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateExplorerRequest  $request
     * @param  \App\Models\Explorer  $explorer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExplorerRequest $request, Explorer $explorer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Explorer  $explorer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Explorer $explorer)
    {
        //
    }
}
