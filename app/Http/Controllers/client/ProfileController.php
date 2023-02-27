<?php

namespace App\Http\Controllers\client;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function update(Request $request)
    {
       $validateData = $request->validate([
            'username'=>['required', 'min:3', 'max:255', 'unique:users'],
            'alamat'=>'required',
            'no_hp'=>'required',
            'photo_profiles'=>'image|file|max:9024',
            'updated_at' => now()
        ]);

        if ($request->file('photo_profiles')) {
            $request->file('photo_profiles')->move('images/', $request->file('photo_profiles')->getClientOriginalName());
            $validateData['photo_profiles'] =  $request->file('photo_profiles')->getClientOriginalName();
        }

        try {
            $data = User::where('id', auth()->user()->id)->update($validateData); 
                 return response()->json([
                     'message' => 'data changed successfully',
                     'data' => $request->validated()
                 ],200);
         } catch (\Throwable $th) {
             //throw $th;
             return response()->json([
                 'message' => 'failed',
                 'errors' => $th->getMessage()
             ]);
         }
    }

    public function verifemail(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'old_email' => ['required', 'email'],
            'email' => ['required', 'email'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'failed',
                'errors' => $validator->errors()
            ]);
        }

        try {
           $data = User::where('email', $request->old_email)->update([
                'email' => $request->email
            ]); 
                return response()->json([
                    'message' => 'email changed successfully',
                    'data' => $validator->validated()
                ],200);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'message' => 'failed',
                'errors' => $th->getMessage()
            ]);
        }
       

       
    }

    public function verifpassword(Request $request)
    {
         if (Hash::check($request->old_password, auth()->user()->password)) {    
            $validateData = $request->validate([
                'password'=>'required|min:5|max:255',
                'updated_at' => now()
            ]);
        
            $validateData['password'] = Hash::make($validateData['password']);
        
            $data = User::where('id', auth()->user()->id)->update($validateData);
            // $request->session()->flash('Success', 'Password berhasil diubah');
            return response()->json([
                'message' => 'password changed successfully',
                // 'data' => $data
            ],200);
        
        }

        return response()->json([
            'message' => 'forbidden',
            'errors' => 'passwords do not match'
        ],403);
    }
}
