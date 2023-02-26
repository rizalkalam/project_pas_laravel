<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Barang;
use App\Models\Preview;
use App\Models\Kategori;
use App\Models\Testimoni;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Cookie;
use App\Http\Requests\StoreBarangRequest;
use App\Http\Requests\UpdateBarangRequest;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Preview $preview, Request $request)
    {
        // $val = Crypt::encrypt(Cookie::get('playerID'), false);
            return view('home',[
                // dd($val),
                // 'cookie'=>$val,
                'barangs'=>Barang::latest()->take(8)->get(),
                'items'=>$preview->items,
                'kategoris'=>Kategori::all(),
                'testimonis'=>Testimoni::paginate(3),
                "active" =>'home',
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBarangRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,)
    {
        // $validateData = $request->validate([
        //     'user_id'=>'required',
        //     'komentar'=>'required',
        //     'tanggal'=>'required'
        // ]);

        // Testimoni::create($validateData);
        // return redirect('/beranda')->with('success', 'komentar berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        return view('detail', [
            'barang'=>$barang,
            'kategoris'=>Kategori::all(),
            "active" =>'barang',
        ]);  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBarangRequest  $request
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testimoni $testimoni)
    {
        $validateData = $request->validate([
            'user_id'=>'required',
            'komentar'=>'required',
            'tanggal'=>'required',
        ]);
        Testimoni::where('id', $testimoni->id)->update($validateData);
        return redirect('/beranda')->with('success', 'Book has been updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimoni $testimoni)
    {   
        Testimoni::destroy($testimoni->id);
        return redirect('/beranda')->with('success', 'data has been deleted !');
    }
}
