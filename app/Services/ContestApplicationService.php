<?php

namespace App\Services;

use App\Models\Contest;
use App\Models\ContestApplication;

class ContestApplicationService
{
    public function apply(Contest $contest, array $data): ContestApplication
    {
        if (!$contest->is_available) {
            abort(403);
        }

        $data['contest_id'] = $contest->id;

        $data['work_file'] = $data['work_file']
            ->store('contest_works', 'public');

        return ContestApplication::create($data);
    }
}
