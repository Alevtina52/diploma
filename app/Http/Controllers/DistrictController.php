<?php

namespace App\Http\Controllers;

use App\Models\District;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    public function index()
    {
        // Получаем все районы с пожарами
        $districts = District::with('fires')->get();

        // Формируем массив для JS, ключ — slug (совпадает с id в SVG)
        $districtData = $districts->mapWithKeys(function ($district) {
            return [
                $district->slug => [
                    'name'   => $district->name,
                    'total'  => $district->fires->count(),
                    'area'   => $district->fires->sum('area'),
                    'active' => $district->fires->where('status', 'active')->count(),
                    'closed' => $district->fires->where('status', 'closed')->count(),
                ]
            ];
        });

        return view('map', compact('districtData'));
    }
}
