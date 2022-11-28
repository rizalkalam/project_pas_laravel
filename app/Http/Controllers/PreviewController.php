<?php

namespace App\Http\Controllers;

use App\Models\Preview;
use App\Http\Requests\StorePreviewRequest;
use App\Http\Requests\UpdatePreviewRequest;

class PreviewController extends Controller
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
     * @param  \App\Http\Requests\StorePreviewRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePreviewRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Preview  $preview
     * @return \Illuminate\Http\Response
     */
    public function show(Preview $preview)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Preview  $preview
     * @return \Illuminate\Http\Response
     */
    public function edit(Preview $preview)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePreviewRequest  $request
     * @param  \App\Models\Preview  $preview
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePreviewRequest $request, Preview $preview)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Preview  $preview
     * @return \Illuminate\Http\Response
     */
    public function destroy(Preview $preview)
    {
        //
    }
}
