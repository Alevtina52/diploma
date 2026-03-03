<?php


namespace App\Http\Controllers;

use App\Models\Contest;
use App\Models\ContestApplication;
use Illuminate\Http\Request;

class ContestController extends Controller
{
    // Список конкурсов
    public function index()
    {
        $contests = Contest::active()->current()->latest()->get();

        return view('contests.index', compact('contests'));
    }

    // Подробнее
    public function show(Contest $contest)
    {
        abort_if(!$contest->is_available, 404);

        return view('contests.show', compact('contest'));
    }

    // Отправка заявки
    public function apply(Request $request, Contest $contest)
    {
        abort_if(!$contest->is_available, 403);

        $data = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'comment' => 'nullable|string',
            'work_file' => 'required|mimes:pdf,doc,docx,jpg,png|max:5120'
        ]);

        $data['contest_id'] = $contest->id;

        $data['work_file'] = $request
            ->file('work_file')
            ->store('contest_works', 'public');

        ContestApplication::create($data);

        return back()->with('success', 'Работа успешно отправлена!');
    }
}
