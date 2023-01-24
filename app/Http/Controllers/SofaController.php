<?php

namespace App\Http\Controllers;

use App\Models\Sofa;
use App\Http\Requests\StoreSofaRequest;
use App\Http\Requests\UpdateSofaRequest;

class SofaController extends Controller
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
     * @param  \App\Http\Requests\StoreSofaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSofaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sofa  $sofa
     * @return \Illuminate\Http\Response
     */
    public function show(Sofa $sofa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sofa  $sofa
     * @return \Illuminate\Http\Response
     */
    public function edit(Sofa $sofa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSofaRequest  $request
     * @param  \App\Models\Sofa  $sofa
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSofaRequest $request, Sofa $sofa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sofa  $sofa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sofa $sofa)
    {
        //
    }
}
