<?php

namespace Database\Seeders;

use App\Models\PermissionModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            'perm_*',
            'perm_update_own_profile',
            'perm_insert_gym_member', 'perm_update_gym_member', 'perm_delete_gym_member', 'perm_select_gym_member',
            'perm_insert_employee', 'perm_update_employee', 'perm_delete_employee', 'perm_select_employee',
            'perm_insert_plan', 'perm_update_plan', 'perm_delete_plan', 'perm_select_plan',
            'perm_insert_exercise', 'perm_update_exercise', 'perm_delete_exercise', 'perm_select_exercise',
            'perm_insert_exercise', 'perm_update_exercise', 'perm_delete_exercise', 'perm_select_exercise',
            'perm_insert_workout_routines', 'perm_update_workout_routines', 'perm_delete_workout_routines', 'perm_select_workout_routines',
        ];

        foreach($permissions as $perm) {
            PermissionModel::create([
                'name' => $perm
            ]);
        }

    }
}
