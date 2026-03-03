<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ContestApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'contest_id',
        'full_name',
        'email',
        'phone',
        'comment',
        'work_file',
    ];

    public function contest()
    {
        return $this->belongsTo(Contest::class);
    }
}
