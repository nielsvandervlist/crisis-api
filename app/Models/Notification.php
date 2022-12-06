<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Tychovbh\LaravelCrud\Contracts\GetParams;

class Notification extends Model
{
    use HasFactory, GetParams;

    protected $fillable = ['title', 'src', 'read', 'description'];

    protected $params = ['read'];

}
