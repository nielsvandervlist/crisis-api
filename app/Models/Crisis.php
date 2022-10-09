<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Tychovbh\LaravelCrud\Contracts\GetParams;

class Crisis extends Model
{
    use HasFactory, GetParams;

    protected $fillable = ['title', 'description', 'company_id', 'user_id', 'status'];

    protected $params = ['user_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function company()
    {
        return $this->hasOne(Company::class);
    }
}
