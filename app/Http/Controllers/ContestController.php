<?php

namespace App\Http\Controllers;

use App\Models\Contest;
use App\Services\ContestService;
use App\Services\ContestApplicationService;
use App\Http\Requests\ApplyContestRequest;

class ContestController extends Controller
{
    public function __construct(
        private ContestService $contestService,
        private ContestApplicationService $applicationService
    ) {}

    public function index()
    {
        $contests = $this->contestService->getActive();

        return view('contests.index', compact('contests'));
    }

    public function show(Contest $contest)
    {
        abort_if(!$contest->is_available, 404);

        return view('contests.show', compact('contest'));
    }

    public function apply(ApplyContestRequest $request, Contest $contest)
    {
        $this->applicationService->apply(
            $contest,
            $request->validated()
        );

        return back()->with('success', 'Работа успешно отправлена!');
    }
}
