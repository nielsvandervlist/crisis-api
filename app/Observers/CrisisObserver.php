<?php

namespace App\Observers;

use App\Actions\GetActivePost;
use App\Events\SendPostEvent;
use App\Models\Crisis;
class CrisisObserver
{
    public function updated(Crisis $crisis)
    {
        if($crisis->status){
            $timeline_posts = (new GetActivePost())->handler($crisis->timeline);
            foreach ($timeline_posts as $timeline_post) {
                $post = $timeline_post->post;
                event(new SendPostEvent($post));
            }
        }
    }
}
