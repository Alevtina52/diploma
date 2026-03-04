<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ContestService;
use App\Http\Requests\StoreContestRequest;

class ContestController extends Controller
{
    public function __construct(
        private ContestService $contestService
    ) {
        $this->middleware('auth');
    }

    public function index()
    {
        $contests = $this->contestService->getAllPaginated();

        return view('admin.contests.index', compact('contests'));
    }

    public function create()
    {
        return view('admin.contests.create');
    }

    public function store(StoreContestRequest $request)
    {
        $this->contestService->create(
            $request->validated()
        );

        return redirect()
            ->route('admin.contests.index')
            ->with('success', 'Конкурс успешно создан');
    }
}
