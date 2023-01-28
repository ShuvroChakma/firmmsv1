<?php

namespace App\Http\Controllers;

use App\Models\MedicineStockHistory;
use App\Http\Requests\StoreMedicineStockHistoryRequest;
use App\Http\Requests\UpdateMedicineStockHistoryRequest;

class MedicineStockHistoryController extends Controller
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
     * @param  \App\Http\Requests\StoreMedicineStockHistoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMedicineStockHistoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MedicineStockHistory  $medicineStockHistory
     * @return \Illuminate\Http\Response
     */
    public function show(MedicineStockHistory $medicineStockHistory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MedicineStockHistory  $medicineStockHistory
     * @return \Illuminate\Http\Response
     */
    public function edit(MedicineStockHistory $medicineStockHistory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMedicineStockHistoryRequest  $request
     * @param  \App\Models\MedicineStockHistory  $medicineStockHistory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMedicineStockHistoryRequest $request, MedicineStockHistory $medicineStockHistory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MedicineStockHistory  $medicineStockHistory
     * @return \Illuminate\Http\Response
     */
    public function destroy(MedicineStockHistory $medicineStockHistory)
    {
        //
    }
}
