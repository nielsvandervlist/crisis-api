<?php

namespace App\Actions;

use App\Models\Timeline;
use App\Models\TimelinePost;

class GetActivePost
{
    public function handler(Timeline $timeline)
    {
        return TimelinePost::params(['active' => [
            'company_id' => $timeline->company_id,
            'crisis_id' => $timeline->crisis_id,
        ]])->get();
    }
}
