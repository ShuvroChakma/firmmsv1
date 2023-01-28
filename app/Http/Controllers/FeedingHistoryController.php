<?php

namespace App\Http\Controllers;

use App\Models\FeedingHistory;
use App\Http\Requests\StoreFeedingHistoryRequest;
use App\Http\Requests\UpdateFeedingHistoryRequest;

class FeedingHistoryController extends Controller
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
     * @param  \App\Http\Requests\StoreFeedingHistoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFeedingHistoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FeedingHistory  $feedingHistory
     * @return \Illuminate\Http\Response
     */
    public function show(FeedingHistory $feedingHistory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FeedingHistory  $feedingHistory
     * @return \Illuminate\Http\Response
     */
    public function edit(FeedingHistory $feedingHistory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFeedingHistoryRequest  $request
     * @param  \App\Models\FeedingHistory  $feedingHistory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFeedingHistoryRequest $request, FeedingHistory $feedingHistory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FeedingHistory  $feedingHistory
     * @return \Illuminate\Http\Response
     */
    public function destroy(FeedingHistory $feedingHistory)
    {
        //
    }
}
