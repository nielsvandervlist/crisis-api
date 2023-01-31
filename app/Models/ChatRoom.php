<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Tychovbh\LaravelCrud\Contracts\GetParams;

class ChatRoom extends Model
{
    use HasFactory, GetParams;

    protected $fillable = ['user_id', 'name'];

    protected $params = ['user_id'];
}
