<?php

namespace App\Http\Controllers;

use App\Models\Kursi;
use App\Http\Requests\StoreKursiRequest;
use App\Http\Requests\UpdateKursiRequest;

class KursiController extends Controller
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
     * @param  \App\Http\Requests\StoreKursiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKursiRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kursi  $kursi
     * @return \Illuminate\Http\Response
     */
    public function show(Kursi $kursi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kursi  $kursi
     * @return \Illuminate\Http\Response
     */
    public function edit(Kursi $kursi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKursiRequest  $request
     * @param  \App\Models\Kursi  $kursi
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKursiRequest $request, Kursi $kursi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kursi  $kursi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kursi $kursi)
    {
        //
    }
}
