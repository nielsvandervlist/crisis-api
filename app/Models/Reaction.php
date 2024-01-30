<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;
use Tychovbh\LaravelCrud\Contracts\GetParams;

class Reaction extends Model
{
    use HasFactory, GetParams, Notifiable;

    protected $fillable = [
        'title',
        'description',
        'src',
        'thumbnail',
        'user_id',
        'score',
        'timeline_post_id',
        'crisis_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function participant(): BelongsTo
    {
        return $this->belongsTo(Participant::class);
    }

    /**
     * @return BelongsTo
     */
    public function timelinePost(): BelongsTo
    {
        return $this->belongsTo(TimelinePost::class);
    }

    /**
     * @return BelongsTo
     */
    public function crisis(): BelongsTo
    {
        return $this->belongsTo(Crisis::class);
    }
}
