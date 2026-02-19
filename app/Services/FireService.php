<?php

namespace App\Services;

use App\Models\Fire;
use App\Models\District;
use Illuminate\Database\Eloquent\Collection;

class FireService
{
    public function getFiresBySlug(?string $slug): Collection
    {
        $query = Fire::with('district');

        if ($slug) {
            $districtId = $this->getDistrictIdBySlug($slug);

            if ($districtId) {
                $query->where('district_id', $districtId);
            }
        }

        return $query->latest()->get();
    }

    public function getDistrictIdBySlug(?string $slug): ?int
    {
        if (!$slug) {
            return null;
        }

        return District::where('slug', $slug)->value('id');
    }

    public function create(array $data): Fire
    {
        return Fire::create($data);
    }

    public function update(Fire $fire, array $data): bool
    {
        return $fire->update($data);
    }

    public function delete(Fire $fire): bool
    {
        return $fire->delete();
    }
}
