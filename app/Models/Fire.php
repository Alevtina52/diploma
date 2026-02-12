<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fire extends Model
{
    protected $fillable = [
        'district_id',
        'area',
        'status',
        'fire_date'
    ];

    public function district()
    {
        return $this->belongsTo(District::class);
    }
}
