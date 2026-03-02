<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contest extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'start_date',
        'end_date',
        'is_active',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date'   => 'date',
        'is_active'  => 'boolean',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function applications()
    {
        return $this->hasMany(ContestApplication::class);
    }

    /*
    |--------------------------------------------------------------------------
    | Accessors
    |--------------------------------------------------------------------------
    */

    // Проверка: активен ли конкурс по датам
    public function getIsAvailableAttribute(): bool
    {
        return $this->is_active
            && now()->between($this->start_date, $this->end_date);
    }

    /*
    |--------------------------------------------------------------------------
    | Scopes
    |--------------------------------------------------------------------------
    */

    // Только активные
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Только действующие по дате
    public function scopeCurrent($query)
    {
        return $query->whereDate('start_date', '<=', now())
            ->whereDate('end_date', '>=', now());
    }
}
