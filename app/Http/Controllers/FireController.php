<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Fire;
use App\Services\FireService;
use Illuminate\Http\Request;
use App\Http\Requests\StoreFireRequest;
use App\Http\Requests\UpdateFireRequest;

class FireController extends Controller
{
    private FireService $fireService;

    public function __construct(FireService $fireService)
    {
        $this->fireService = $fireService;
    }

    public function index(Request $request)
    {
        $fires = $this->fireService
            ->getFiresBySlug($request->slug);

        return view('fires.index', compact('fires'));
    }

    public function create(Request $request)
    {
        $districts = District::all();

        $selectedDistrict = $this->fireService
            ->getDistrictIdBySlug($request->slug);

        return view('fires.create', compact('districts', 'selectedDistrict'));
    }

    public function store(StoreFireRequest $request)
    {
        $this->fireService->create($request->validated());

        return redirect()
            ->route('admin.map')
            ->with('success', 'Пожар успешно добавлен');
    }

    public function edit(Fire $fire)
    {
        $districts = District::all();

        return view('fires.edit', compact('fire', 'districts'));
    }

    public function update(UpdateFireRequest $request, Fire $fire)
    {
        $this->fireService->update($fire, $request->validated());

        return redirect()
            ->route('fires.index')
            ->with('success', 'Пожар обновлён');
    }

    public function destroy(Fire $fire)
    {
        $this->fireService->delete($fire);

        return redirect()
            ->route('fires.index')
            ->with('success', 'Пожар удалён');
    }
}
