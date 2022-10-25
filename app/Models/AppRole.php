<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppRole extends Model
{
    use HasFactory;

    public const ADMIN_ROLE = 'admin';
    public const EDITOR_ROLE = 'editor';
    public const PARTICIPANT_ROLE = 'participant';
}
