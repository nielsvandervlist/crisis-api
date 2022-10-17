<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Tychovbh\LaravelCrud\Contracts\GetParams;

class Reaction extends Model
{
    use HasFactory, GetParams;

    protected $fillable = [
        'title',
        'description',
        'thumbnail',
        'notification',
        'time',
        'reaction_type_id',
        'participant_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function participant(): BelongsTo
    {
        return $this->belongsTo(Participant::class);
    }
}
