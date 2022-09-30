<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Tychovbh\LaravelCrud\Contracts\GetParams;

class Crisis extends Model
{
    use HasFactory, GetParams;

    protected $fillable = ['title', 'description', 'company_id', 'user_id'];

    protected $params = ['user_id'];
}
