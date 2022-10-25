<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppPermission extends Model
{
    use HasFactory;

    public const CAN_INDEX_POSTS = 'index-posts';
    public const CAN_SHOW_POSTS = 'show-posts';
    public const CAN_CREATE_POSTS = 'create-posts';
    public const CAN_UPDATE_POSTS = 'update-posts';
    public const CAN_DELETE_POSTS = 'delete-posts';

    public const CAN_INDEX_PARTICIPANTS = 'index-participants';
    public const CAN_SHOW_PARTICIPANTS = 'show-participants';
    public const CAN_CREATE_PARTICIPANTS = 'create-participants';
    public const CAN_UPDATE_PARTICIPANTS = 'update-participants';
    public const CAN_DELETE_PARTICIPANTS = 'delete-participants';

    public const CAN_INDEX_TIMELINES = 'index-timelines';
    public const CAN_SHOW_TIMELINES = 'show-timelines';
    public const CAN_CREATE_TIMELINES = 'create-timelines';
    public const CAN_UPDATE_TIMELINES = 'update-timelines';
    public const CAN_DELETE_TIMELINES = 'delete-timelines';

    public const CAN_INDEX_COMPANIES = 'index-companies';
    public const CAN_SHOW_COMPANIES = 'show-companies';
    public const CAN_CREATE_COMPANIES = 'create-companies';
    public const CAN_UPDATE_COMPANIES = 'update-companies';
    public const CAN_DELETE_COMPANIES = 'delete-companies';

    public const CAN_INDEX_REACTIONS = 'index-reactions';
    public const CAN_SHOW_REACTIONS = 'show-reactions';
    public const CAN_CREATE_REACTIONS = 'create-reactions';
    public const CAN_UPDATE_REACTIONS = 'update-reactions';
    public const CAN_DELETE_REACTIONS = 'delete-reactions';
}
