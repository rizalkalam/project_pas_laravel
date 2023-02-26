<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardPenggunaController extends Controller
{
    public function index()
    {
        return view ('dashboard.pengguna.all',[
            'users'=>User::latest()->filter(request(['search']))->paginate(30),
        ]);
    }


}
