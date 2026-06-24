<?php

namespace App\Models;

use Database\Factories\AnnouncementFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    /** @use HasFactory<AnnouncementFactory> */
    use HasFactory;

    /**
     * @var list<string>
     */
    protected $fillable = [
        'reporter_name',
        'reporter_email',
        'title',
        'category',
        'location',
        'credibility',
        'is_spoiler',
        'body',
        'image_path',
    ];

    /**
     * @var array<string, mixed>
     */
    protected $attributes = [
        'credibility' => 3,
        'is_spoiler' => false,
    ];

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'credibility' => 'integer',
            'is_spoiler' => 'boolean',
        ];
    }
}
