<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Kategori;
use App\Models\Testimoni;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.index',[
            'active' =>'kategori',
            'kategoris' => Kategori::all(),
            'testimoni'=> Testimoni::all()
        ]);
    }

    public function edit()
    {
        return view('profile.edit_profile',[
            'active' =>'kategori',
            'kategoris' => Kategori::all(),
        ]);
    }

    public function update(Request $request, User $user)
    {
        $validateData = $request->validate([
            'username'=>['required', 'min:3', 'max:255', 'unique:users'],
            'email'=>'required|email:dns',
            'password'=>'required|min:5|max:255',
            'alamat'=>'required',
            'no_hp'=>'required',
            'photo_profiles'=>'image|file|max:9024',
            'updated_at' => now()
        ]);

        // $validateData['password'] = Hash::make($validateData['password']);

        if ($request->file('photo_profiles')) {
            $request->file('photo_profiles')->move('images/', $request->file('photo_profiles')->getClientOriginalName());
            $validateData['photo_profiles'] =  $request->file('photo_profiles')->getClientOriginalName();
        }

        User::where('id', auth()->user()->id)->update($validateData);
        $request->session()->flash('Success', 'Data berhasil diubah');
        
        return redirect('/profile/me');
    }

    public function store(Request $request,)
    {
        $validateData = $request->validate([
            'user_id'=>'required',
            'komentar'=>'required',
            'tanggal'=>'required'
        ]);

        Testimoni::create($validateData);
        return redirect('/profile/me')->with('success', 'komentar berhasil ditambahkan');
    }

    public function uptesti(Request $request, Testimoni $testimoni)
    {
        $validateData = $request->validate([
            'user_id'=>'required',
            'komentar'=>'required',
            'tanggal'=>'required',
        ]);
        Testimoni::where('id', $testimoni->id)->update($validateData);
        return redirect('/profile/me')->with('success', 'Book has been updated !');
    }

    public function destroy(Testimoni $testimoni)
    {   
        Testimoni::destroy($testimoni->id);
        return redirect('/profile/me')->with('success', 'data has been deleted !');
    }

    public function verif(Request $request)
    {
        if (Hash::check($request->password, auth()->user()->password)) {
            return redirect('/profile/pw');
        }
        return redirect('/profile/me')->with('loginError', 'Password tidak sesuai!');
    }

    public function pwview()
    {
        return view('profile.edit_pw');
    }

    public function uppassword(Request $request)
    {
        $validateData = $request->validate([
            'password'=>'required|min:5|max:255',
            'updated_at' => now()
        ]);

          $validateData['password'] = Hash::make($validateData['password']);

          User::where('id', auth()->user()->id)->update($validateData);
          $request->session()->flash('Success', 'Password berhasil diubah');
          
          return redirect('/profile/me');
    }
}
