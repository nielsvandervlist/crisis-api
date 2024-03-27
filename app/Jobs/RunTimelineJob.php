<?php

namespace App\Jobs;

use App\Actions\GetActivePost;
use App\Models\Post;
use App\Models\Timeline;
use App\Models\TimelinePost;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class RunTimelineJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public Timeline $timeline;
    public int $minute;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($timeline, $minute)
    {
        $this->timeline = $timeline;
        $this->minute = $minute;
    }

    /**
     * Execute the job.
     *
     * @return int|void
     */
    public function handle()
    {
        $this->timeline->time = $this->minute / 60;
        $this->timeline->saveQuietly();

        $post = Post::query()->select('posts.*')
            ->join('timeline_posts', 'posts.id', 'timeline_posts.post_id')
            ->join('timelines', 'timelines.id', 'timeline_posts.timeline_id')
            ->where('timeline_posts.timeline_id', $this->timeline->id)
            ->where('timeline_posts.time', '<', $this->minute / 60)
            ->whereNull('posts.online')
            ->first();

        if ($post) {
            SendPostJob::dispatch($post);
            $post->online = 1;
            $post->saveQuietly();
        }
    }

    public function timelineTime(){
        return TimelinePost::query()->where('post_id', $this->post->id)->get()->timeline();
    }
}
