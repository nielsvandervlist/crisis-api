<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Tychovbh\LaravelCrud\Contracts\GetParams;

class Round extends Model
{
    use HasFactory, GetParams;

    protected $fillable = [
        'name',
        'description',
        'number',
        'crisis_id',
        'timeline_id'
    ];

    protected $params = [
        'crisis_id',
        'timeline_id'
    ];
}
