<?php

namespace App\Http\Controllers;

use App\Models\FoodStockHistory;
use App\Http\Requests\StoreFoodStockHistoryRequest;
use App\Http\Requests\UpdateFoodStockHistoryRequest;

class FoodStockHistoryController extends Controller
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
     * @param  \App\Http\Requests\StoreFoodStockHistoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFoodStockHistoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FoodStockHistory  $foodStockHistory
     * @return \Illuminate\Http\Response
     */
    public function show(FoodStockHistory $foodStockHistory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FoodStockHistory  $foodStockHistory
     * @return \Illuminate\Http\Response
     */
    public function edit(FoodStockHistory $foodStockHistory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFoodStockHistoryRequest  $request
     * @param  \App\Models\FoodStockHistory  $foodStockHistory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFoodStockHistoryRequest $request, FoodStockHistory $foodStockHistory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FoodStockHistory  $foodStockHistory
     * @return \Illuminate\Http\Response
     */
    public function destroy(FoodStockHistory $foodStockHistory)
    {
        //
    }
}
