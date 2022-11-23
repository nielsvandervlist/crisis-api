<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Tychovbh\LaravelCrud\Contracts\GetParams;

class Rapport extends Model
{
    use HasFactory, GetParams;

    protected $fillable = [
        'crisis_id',
        'title',
        'description',
        'reaction_score',
        'sharing_score',
        'content_score'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function crisis()
    {
        return $this->belongsTo(Crisis::class);
    }
}
