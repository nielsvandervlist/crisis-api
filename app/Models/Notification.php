<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'src', 'status', 'participant_id', 'reaction_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function reaction()
    {
        return $this->hasOne(Reaction::class, 'reactions');
    }

}
