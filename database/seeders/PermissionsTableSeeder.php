<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'location_create',
            ],
            [
                'id'    => 18,
                'title' => 'location_edit',
            ],
            [
                'id'    => 19,
                'title' => 'location_show',
            ],
            [
                'id'    => 20,
                'title' => 'location_delete',
            ],
            [
                'id'    => 21,
                'title' => 'location_access',
            ],
            [
                'id'    => 22,
                'title' => 'doc_library_create',
            ],
            [
                'id'    => 23,
                'title' => 'doc_library_edit',
            ],
            [
                'id'    => 24,
                'title' => 'doc_library_show',
            ],
            [
                'id'    => 25,
                'title' => 'doc_library_delete',
            ],
            [
                'id'    => 26,
                'title' => 'doc_library_access',
            ],
            [
                'id'    => 27,
                'title' => 'cases_modal_create',
            ],
            [
                'id'    => 28,
                'title' => 'cases_modal_edit',
            ],
            [
                'id'    => 29,
                'title' => 'cases_modal_show',
            ],
            [
                'id'    => 30,
                'title' => 'cases_modal_delete',
            ],
            [
                'id'    => 31,
                'title' => 'cases_modal_access',
            ],
            [
                'id'    => 32,
                'title' => 'ortho_chat_show',
            ],
            [
                'id'    => 33,
                'title' => 'ortho_chat_delete',
            ],
            [
                'id'    => 34,
                'title' => 'ortho_chat_access',
            ],
            [
                'id'    => 35,
                'title' => 'staff_notification_create',
            ],
            [
                'id'    => 36,
                'title' => 'staff_notification_edit',
            ],
            [
                'id'    => 37,
                'title' => 'staff_notification_show',
            ],
            [
                'id'    => 38,
                'title' => 'staff_notification_delete',
            ],
            [
                'id'    => 39,
                'title' => 'staff_notification_access',
            ],
            [
                'id'    => 40,
                'title' => 'appointment_create',
            ],
            [
                'id'    => 41,
                'title' => 'appointment_edit',
            ],
            [
                'id'    => 42,
                'title' => 'appointment_show',
            ],
            [
                'id'    => 43,
                'title' => 'appointment_delete',
            ],
            [
                'id'    => 44,
                'title' => 'appointment_access',
            ],
            [
                'id'    => 45,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
