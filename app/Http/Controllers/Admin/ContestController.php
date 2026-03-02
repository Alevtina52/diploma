<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contest;
use Illuminate\Http\Request;

class ContestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $contests = Contest::latest()->paginate(10);

        return view('admin.contests.index', compact('contests'));
    }

    public function create()
    {
        return view('admin.contests.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')
                ->store('contests', 'public');
        }

        Contest::create($data);

        return redirect()
            ->route('admin.contests.index')
            ->with('success', 'Конкурс успешно создан');
    }
}
