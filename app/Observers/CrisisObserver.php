<?php

namespace App\Observers;

use App\Actions\GetActivePost;
use App\Jobs\SendPostJob;
use App\Models\Crisis;
class CrisisObserver
{
    public function updated(Crisis $crisis)
    {
        if($crisis->status){
            $timeline_posts = (new GetActivePost())->handler($crisis->timeline);
            foreach ($timeline_posts as $timeline_post) {
                $post = $timeline_post->post;
                SendPostJob::dispatch($post)->delay(now()->addMinutes($timeline_post->time));
            }
        }
    }
}
