<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Ladumor\OneSignal\OneSignal;
use App\Http\Controllers\Controller;

class DashboardProdukController extends Controller
{
    public function index()
    {
        return view ('dashboard.produk.all',[
            'kategori'=> Kategori::all(),
            'barangs' => Barang::latest()->filter(request(['search','kategori']))->paginate(6)
        ]);
    }

    public function create()
    {
        return view('dashboard.produk.add_produk',[
            'kategori'=>Kategori::all()
        ]);
    }

    public function store(Request $request)
    {
         $data = Barang::create($request->all());
        if ($request->hasFile('gambar_barang')) {
            $request->file('gambar_barang')->move('images/', $request->file('gambar_barang')->getClientOriginalName());
            $data->gambar_barang = $request->file('gambar_barang')->getClientOriginalName();
            $data->save();
        }
        if ($request->hasFile('gambar_detail_barang')) {
            $request->file('gambar_detail_barang')->move('images/', $request->file('gambar_detail_barang')->getClientOriginalName());
            $data->gambar_detail_barang = $request->file('gambar_detail_barang')->getClientOriginalName();
            $data->save();
        }

        $fields['include_player_ids'] = [$playerId];
        $message = 'Ada produk baru!!!, Jangan lewatkan' ;  
        
        OneSignal::sendPush($fields, $message);
        return redirect('/dashboard/produk')->with('success', 'Produk berhasil ditambhakan !');
    }

    public function edit(Barang $barang)
    {
        return view('dashboard.produk.edit_produk',[
            'kategori'=>Kategori::all(),
            'barang'=>$barang,
        ]);
    }

    public function update(Request $request, Barang $barang)
    {
        $validateData = $request->validate([
            'kategori_id'=>'required',
            'nama_barang'=>'required',
            'slug'=>'required',
            'harga'=>'required',
            'deskripsi_barang'=>'required',
            'gambar_barang'=>'image|file|max:9024',
            'gambar_detail_barang'=>'image|file|max:9024',
        ]);

        if ($request->file('gambar_barang')) {
            $request->file('gambar_barang')->move('images/', $request->file('gambar_barang')->getClientOriginalName());
            $validateData['gambar_barang'] =  $request->file('gambar_barang')->getClientOriginalName();
        }

        if ($request->file('gambar_detail_barang')) {
            $request->file('gambar_detail_barang')->move('images/', $request->file('gambar_detail_barang')->getClientOriginalName());
            $validateData['gambar_detail_barang'] =  $request->file('gambar_detail_barang')->getClientOriginalName();
        }

        Barang::where('id',$barang->id)->update($validateData);
        return redirect('/dashboard/produk')->with('success', 'Produk berhasil di update !');
    }

    public function destroy(Barang $barang)
    {
        Barang::destroy($barang->id);
        return redirect('/dashboard/produk')->with('success', 'Produk berhasil dihapus !');
    }
}
