<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;
use Tychovbh\LaravelCrud\Contracts\GetParams;

class Participant extends Model
{
    use HasFactory, GetParams;

    protected $fillable = ['name', 'profile_img', 'user_id', 'company_id', 'hash', 'email', 'online'];

    protected $params = ['user_id', 'company_id', 'hash'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company()
    {
        return $this->BelongsTo(Company::class);
    }

    public function user()
    {
        return$this->belongsTo(User::class);
    }

    /**
     * @return mixed
     */
    public function isOnline()
    {
        $user = User::where('email', $this->email)->get();
        return Redis::get('user-is-online-' . $user->pluck('id')[0]);
    }
}
