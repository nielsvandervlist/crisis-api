<?php

namespace App\Observers;

use App\Events\SendPostEvent;
use App\Jobs\SendPostJob;
use App\Models\Notification;
use App\Models\Post;

class PostObserver
{
    public function updating(Post $post)
    {
//        if($post->online){
//            //Create post event for
//            SendPostJob::dispatch($post);
//            //Create notification
//            $notification = new Notification([
//               'title' => $post->title,
//               'description' => $post->description,
//               'src' => 'test',
//               'read' => false,
//            ]);
//
//            $notification->save();
//        }
    }
}
