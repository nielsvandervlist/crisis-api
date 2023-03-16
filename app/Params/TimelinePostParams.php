<?php

namespace App\Params;

use Carbon\Carbon;
use Tychovbh\LaravelCrud\Params\Params;

class TimelinePostParams extends Params
{
    /**
     * Search records.
     * @param string $value
     */
    public function search(string $value)
    {
        $this->query->where('name', 'like', '%' . $value . '%');
    }

    public function active(array $active)
    {
        $this->query
            ->join('posts', 'posts.id', 'timeline_posts.post_id')
            ->join('timelines', 'timelines.id', 'timeline_posts.timeline_id')
            ->where('timelines.company_id', $active['company_id'])
            ->where('timelines.crisis_id', $active['crisis_id']);
    }

    public function makeActive(array $timeline)
    {
        $this->query
            ->join('posts', 'posts.id', 'timeline_posts.post_id')
            ->join('timelines', 'timelines.id', 'timeline_posts.timeline_id')
            ->where('timeline_posts.online', false)

            ->where('timelines.company_id', $timeline['company_id'])
            ->where('timelines.crisis_id', $timeline['crisis_id']);
    }
}
