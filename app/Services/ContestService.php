<?php

namespace App\Services;

use App\Models\Contest;
use Illuminate\Support\Facades\Storage;

class ContestService
{
    public function getActive()
    {
        return Contest::active()
            ->current()
            ->latest()
            ->get();
    }

    public function getAllPaginated($perPage = 10)
    {
        return Contest::latest()->paginate($perPage);
    }

    public function create(array $data): Contest
    {
        if (isset($data['image'])) {
            $data['image'] = $data['image']
                ->store('contests', 'public');
        }

        return Contest::create($data);
    }
}
