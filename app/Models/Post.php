<?php

namespace App\Models;

use App\Clients\Spaces;
use App\Contracts\HasFiles;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Tychovbh\LaravelCrud\Contracts\GetParams;

class Post extends Model
{
    use HasFactory, GetParams, HasFiles;

    protected $fillable = ['title', 'description', 'post_type_id', 'user_id', 'online'];

    protected array $params = ['user_id'];

    protected array $files = [
        'thumbnail' => 'posts/thumbnail'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function postType()
    {
        return $this->hasOne(PostType::class);
    }

    /**
     * @return Attribute
     */
    protected function thumbnailUrl(): Attribute
    {
        return Attribute::make(
            get: fn() => Spaces::url($this->thumbnail)
        );
    }
}
