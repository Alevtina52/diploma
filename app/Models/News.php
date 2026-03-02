<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'title',
        'content',
        'image',
        'user_id',
        'status',
        'publish_at'
    ];

    protected $casts = [
        'publish_at' => 'datetime',
    ];
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
