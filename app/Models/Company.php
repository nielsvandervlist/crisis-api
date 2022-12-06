<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Tychovbh\LaravelCrud\Contracts\GetParams;

class Company extends Model
{
    use HasFactory, GetParams;

    protected $fillable = ['name', 'user_id', 'description'];

    protected $params = ['user_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function participants(): HasMany
    {
        return $this->hasMany(Participant::class);
    }
}
