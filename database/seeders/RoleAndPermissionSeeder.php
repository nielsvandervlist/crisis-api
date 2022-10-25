<?php

namespace Database\Seeders;

use App\Models\AppPermission;
use App\Models\AppRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => AppPermission::CAN_INDEX_POSTS]);
        Permission::create(['name' => AppPermission::CAN_SHOW_POSTS]);
        Permission::create(['name' => AppPermission::CAN_CREATE_POSTS]);
        Permission::create(['name' => AppPermission::CAN_UPDATE_POSTS]);
        Permission::create(['name' => AppPermission::CAN_DELETE_POSTS]);

        $adminRole = Role::create(['name' => AppRole::ADMIN_ROLE]);
        $editorRole = Role::create(['name' => AppRole::EDITOR_ROLE]);
        $participantRole = Role::create(['name' => AppRole::PARTICIPANT_ROLE]);

        $adminRole->givePermissionTo([
            AppPermission::CAN_INDEX_POSTS,
            AppPermission::CAN_SHOW_POSTS,
            AppPermission::CAN_CREATE_POSTS,
            AppPermission::CAN_UPDATE_POSTS,
            AppPermission::CAN_DELETE_POSTS,
        ]);

        $editorRole->givePermissionTo([
            AppPermission::CAN_INDEX_POSTS,
            AppPermission::CAN_SHOW_POSTS,
            AppPermission::CAN_CREATE_POSTS,
            AppPermission::CAN_UPDATE_POSTS,
            AppPermission::CAN_DELETE_POSTS,
        ]);

        $participantRole->givePermissionTo([
            //
        ]);
    }
}
