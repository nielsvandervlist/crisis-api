<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Tychovbh\LaravelCrud\Contracts\GetParams;

class Upload extends Model
{
    use HasFactory, GetParams;

    protected $fillable = ['user_id', 'location'];

    protected $params = ['user_id'];
}
