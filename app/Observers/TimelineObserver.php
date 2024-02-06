<?php

namespace App\Observers;

use App\Jobs\RunTimelineJob;
use App\Models\Timeline;

class TimelineObserver
{
    public function updated(Timeline $timeline){
        if($timeline->online && $timeline->crisis->status){
            $seconds = ($timeline->duration * 60) * 60;
            foreach (range(0, $seconds, 60) as $second) {
                RunTimelineJob::dispatch($timeline, $second)->delay($second);
            }
        }
    }
}
