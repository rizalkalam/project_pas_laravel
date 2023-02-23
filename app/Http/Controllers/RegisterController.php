<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index',[
            'kategoris'=>Kategori::all(),
            'active'=>'register'
        ]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'username'=>['required', 'min:3', 'max:255', 'unique:users'],
            'email'=>'required|email:dns|unique:users',
            'password'=>'required|min:5|max:255',
            'alamat'=>'required',
            'no_hp'=>'required',
        ]);

        $validateData['password'] = Hash::make($validateData['password']);

        User::create($validateData);
        $request->session()->flash('Success', 'Registration, Success');
        
        return redirect('/login');
    }
}
