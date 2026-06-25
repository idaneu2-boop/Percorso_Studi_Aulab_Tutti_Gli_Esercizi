<?php

namespace App\Models;

use Database\Factories\AnimeFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anime extends Model
{
    /** @use HasFactory<AnimeFactory> */
    use HasFactory;

    /**
     * @var list<string>
     */
    protected $fillable = [
        'title',
        'genre',
        'synopsis',
    ];
}
