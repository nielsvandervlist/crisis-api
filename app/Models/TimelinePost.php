<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Tychovbh\LaravelCrud\Contracts\GetParams;

class TimelinePost extends Model
{
    use HasFactory, GetParams;

    protected $fillable = ['time','post_id','timeline_id', 'online'];

    protected $params = ['timeline_id', 'online'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function timeline()
    {
       return $this->BelongsTo(Timeline::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function post()
    {
        return $this->BelongsTo(Post::class);
    }
}
