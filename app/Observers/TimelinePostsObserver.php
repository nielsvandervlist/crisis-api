<?php

namespace App\Observers;

use App\Events\SendPostEvent;
use App\Models\TimelinePost;

class TimelinePostsObserver
{
    public function updated(TimelinePost $timeline_post)
    {
        if($timeline_post->online){
            event(new SendPostEvent($timeline_post->post));
        }
    }
}
