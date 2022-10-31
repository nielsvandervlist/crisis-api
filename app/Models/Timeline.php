<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Tychovbh\LaravelCrud\Contracts\GetParams;

class Timeline extends Model
{
    use HasFactory, GetParams;

    protected $fillable = ['title', 'duration', 'company_id', 'user_id', 'crisis_id'];

    protected $params = ['user_id', 'company_id', 'crisis_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company()
    {
        return $this->BelongsTo(Company::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function crisis()
    {
        return $this->BelongsTo(Crisis::class);
    }
}
