<?php

namespace App\Models;

use App\Contracts\HasFiles;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Tychovbh\LaravelCrud\Contracts\GetParams;

class Document extends Model
{
    use HasFactory, GetParams, HasFiles;

    protected $fillable = [
        'crisis_id',
        'user_id',
        'url',
    ];

    protected array $files = [
        'url' => 'documents/url'
    ];
}
