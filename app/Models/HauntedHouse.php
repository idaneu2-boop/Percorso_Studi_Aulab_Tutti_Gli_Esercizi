<?php

namespace App\Models;

use Database\Factories\HauntedHouseFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HauntedHouse extends Model
{
    /** @use HasFactory<HauntedHouseFactory> */
    use HasFactory;

    /**
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'location',
        'price_per_night',
        'description',
        'image_url',
        'is_recommended',
    ];

    /**
     * @var array<string, mixed>
     */
    protected $attributes = [
        'is_recommended' => false,
    ];

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'price_per_night' => 'decimal:2',
            'is_recommended' => 'boolean',
        ];
    }
}
