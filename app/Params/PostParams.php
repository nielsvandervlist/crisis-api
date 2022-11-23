<?php
namespace App\Params;

use Carbon\Carbon;
use Tychovbh\LaravelCrud\Params\Params;

class PostParams extends Params
{
    /**
     * Search records.
     * @param string $value
     */
    public function search(string $value)
    {
        $this->query->where('name', 'like', '%' . $value . '%');
    }

    public function active(string $company_id)
    {
        $this->query
            ->join('timeline_posts', 'timeline_posts.post_id', 'posts.id')
            ->join('timelines', 'timelines.id', 'timeline_posts.timeline_id')
            ->where('timelines.company_id', $company_id)
            ->whereDate('timeline_posts.time', '=', Carbon::now())
            ->whereTime('timeline_posts.time', '>', Carbon::now());
    }
}
