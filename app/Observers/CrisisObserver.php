<?php

namespace App\Observers;

use App\Models\Crisis;
use App\Models\Timeline;

class CrisisObserver
{
    public function updating(Crisis $crisis)
    {
        if(!$crisis->status){
            return true;
        }

        $timeline = Timeline::params([
            'crisis_id' => $crisis->id
        ])->get();

        $start = $timeline->start_time;
        $end = $timeline->end_time;

        // Check when post is in time frame

        // Check when crisis is finished

    }
}
