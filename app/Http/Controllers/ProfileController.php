<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Kategori;
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
            // 'password'=>'required|min:5|max:255',
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
}
