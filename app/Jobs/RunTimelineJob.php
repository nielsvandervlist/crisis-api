<?php

namespace App\Jobs;

use App\Models\Timeline;
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
        $this->timeline->time = $this->minute;
        $this->timeline->saveQuietly();

        $posts = $this->timeline->timelinePosts;
    }
}
