<?php

namespace App\Http\Controllers;

use App\Models\District;

class AdminMapController extends Controller
{
    public function index()
    {
        $districts = District::all();
        return view('admin.map', compact('districts'));
    }
}
