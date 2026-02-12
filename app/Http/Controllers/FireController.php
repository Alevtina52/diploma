<?php

namespace App\Http\Controllers;

use App\Models\Fire;
use App\Models\District;
use Illuminate\Http\Request;

class FireController extends Controller
{
    public function index(Request $request)
    {
        $query = Fire::with('district');

        if ($request->slug) {
            $district = District::where('slug', $request->slug)->first();

            if ($district) {
                $query->where('district_id', $district->id);
            }
        }

        $fires = $query->latest()->get();

        return view('fires.index', compact('fires'));
    }


    public function create(Request $request)
    {
        $districts = District::all();
        $selectedDistrict = null;

        if ($request->slug) {
            $district = District::where('slug', $request->slug)->first();
            $selectedDistrict = $district?->id;
        }

        return view('fires.create', compact('districts', 'selectedDistrict'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'district_id' => 'required|exists:districts,id',
            'area' => 'required|numeric',
            'status' => 'required|string',
            'fire_date' => 'required|date',
        ]);

        Fire::create($request->all());

        return redirect()->route('admin.map')
            ->with('success', 'Пожар успешно добавлен');
    }

    public function edit(Fire $fire)
    {
        $districts = District::all();
        return view('fires.edit', compact('fire', 'districts'));
    }

    public function update(Request $request, Fire $fire)
    {
        $request->validate([
            'district_id' => 'required|exists:districts,id',
            'area' => 'required|numeric',
            'status' => 'required|string',
            'fire_date' => 'required|date',
        ]);

        $fire->update($request->all());

        return redirect()->route('fires.index')
            ->with('success', 'Пожар обновлён');
    }

    public function destroy(Fire $fire)
    {
        $fire->delete();

        return redirect()->route('fires.index')
            ->with('success', 'Пожар удалён');
    }
}
