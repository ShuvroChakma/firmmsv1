<?php

namespace App\Http\Controllers;

use App\Models\Extras;
use App\Http\Requests\StoreExtrasRequest;
use App\Http\Requests\UpdateExtrasRequest;

class ExtrasController extends Controller
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
     * @param  \App\Http\Requests\StoreExtrasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExtrasRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Extras  $extras
     * @return \Illuminate\Http\Response
     */
    public function show(Extras $extras)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Extras  $extras
     * @return \Illuminate\Http\Response
     */
    public function edit(Extras $extras)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateExtrasRequest  $request
     * @param  \App\Models\Extras  $extras
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExtrasRequest $request, Extras $extras)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Extras  $extras
     * @return \Illuminate\Http\Response
     */
    public function destroy(Extras $extras)
    {
        //
    }
}
