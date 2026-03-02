<?php

namespace App\Services;

use App\Models\News;
use Illuminate\Support\Facades\Storage;

class NewsService
{
    public function create(array $data)
    {
        if (isset($data['image'])) {
            $data['image'] = $data['image']->store('news', 'public');
        }

        return News::create($data);
    }
}
