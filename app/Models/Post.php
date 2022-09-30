<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Tychovbh\LaravelCrud\Contracts\GetParams;

class Post extends Model
{
    use HasFactory, GetParams;

    protected $fillable = ['title', 'description', 'post_type_id', 'user_id'];

    protected array $params = ['user_id'];
}
