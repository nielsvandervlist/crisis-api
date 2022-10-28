<?php

namespace App\Observers;

use App\Models\Crisis;
use App\Models\Timeline;

class CrisisObserver
{
    public function updating(Crisis $crisis)
    {
//        if(!$crisis->status){
//            return true;
//        }
//
//        $timeline = Timeline::params([
//            'crisis_id' => $crisis->id
//        ])->get();
    }
}
