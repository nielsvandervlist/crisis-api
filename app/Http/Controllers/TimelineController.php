<?php

namespace App\Http\Controllers;

use App\Jobs\RunTimelineJob;
use App\Models\Timeline;
use App\Models\TimelinePost;

class TimelineController extends Controller
{
    public function run($id)
    {
        $timeline = Timeline::find($id);

        if($timeline->online){
            $posts = TimelinePost::query()
                ->where('online', false)
                ->where('time', '>=' , ($timeline->time / 60) / 60)
                ->where('timeline_id', $timeline->id)
                ->get();

            $test = $posts;
        }
//
        return response()->json($timeline->toArray());
    }
}
