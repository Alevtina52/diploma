<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNewsRequest;
use App\Services\NewsService;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    private NewsService $newsService;

    public function __construct(NewsService $newsService)
    {
        $this->middleware('auth');
        $this->newsService = $newsService;
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(StoreNewsRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::id();

        $this->newsService->create($data);

        return redirect()
            ->route('admin.news.index')
            ->with('success', 'Новость создана');
    }

    public function index()
    {
        $news = \App\Models\News::with('author')
            ->latest()
            ->paginate(10);

        return view('admin.news.index', compact('news'));
    }
}
