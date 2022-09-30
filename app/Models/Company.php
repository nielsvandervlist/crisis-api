<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Tychovbh\LaravelCrud\Contracts\GetParams;

class Company extends Model
{
    use HasFactory, GetParams;

    protected $fillable = ['name', 'user_id', 'description'];
}
