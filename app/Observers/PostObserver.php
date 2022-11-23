<?php

namespace App\Observers;

use App\Events\SendPostEvent;
use App\Models\Post;

class PostObserver
{
    public function updating(Post $post)
    {
        if($post->online){
            event(new SendPostEvent($post));
        }
    }
}
