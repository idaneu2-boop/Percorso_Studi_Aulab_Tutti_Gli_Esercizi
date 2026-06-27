<?php

namespace App\Jobs;

use App\Support\ExerciseCatalog;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\Attributes\Backoff;
use Illuminate\Queue\Attributes\Queue;
use Illuminate\Queue\Attributes\Timeout;
use Illuminate\Queue\Attributes\Tries;

#[Queue('catalog')]
#[Tries(3)]
#[Backoff(5, 30, 120)]
#[Timeout(20)]
class WarmExerciseCatalog implements ShouldQueue
{
    use Queueable;

    public function handle(ExerciseCatalog $catalog): void
    {
        $catalog->warm();
    }
}
