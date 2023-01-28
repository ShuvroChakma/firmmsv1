<?php

namespace App\Http\Controllers;

use App\Models\VaccinationHistory;
use App\Http\Requests\StoreVaccinationHistoryRequest;
use App\Http\Requests\UpdateVaccinationHistoryRequest;

class VaccinationHistoryController extends Controller
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
     * @param  \App\Http\Requests\StoreVaccinationHistoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVaccinationHistoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VaccinationHistory  $vaccinationHistory
     * @return \Illuminate\Http\Response
     */
    public function show(VaccinationHistory $vaccinationHistory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VaccinationHistory  $vaccinationHistory
     * @return \Illuminate\Http\Response
     */
    public function edit(VaccinationHistory $vaccinationHistory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVaccinationHistoryRequest  $request
     * @param  \App\Models\VaccinationHistory  $vaccinationHistory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVaccinationHistoryRequest $request, VaccinationHistory $vaccinationHistory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VaccinationHistory  $vaccinationHistory
     * @return \Illuminate\Http\Response
     */
    public function destroy(VaccinationHistory $vaccinationHistory)
    {
        //
    }
}
