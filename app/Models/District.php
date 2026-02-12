<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $fillable = [
        'name',
        'description'
    ];

    public function fires()
    {
        return $this->hasMany(Fire::class);
    }
}
