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
            'App:*',
            'GymMember:insert', 'GymMember:update', 'GymMember:delete', 'GymMember:select',
            'Employee:insert', 'Employee:update', 'Employee:delete', 'Employee:select',
            'Plan:insert', 'Plan:update', 'Plan:delete', 'Plan:select',
            'Exercise:insert', 'Exercise:update', 'Exercise:delete', 'Exercise:select',
            'WorkoutRoutine:insert', 'WorkoutRoutine:update', 'WorkoutRoutine:delete', 'WorkoutRoutine:select',
        ];

        foreach($permissions as $perm) {
            PermissionModel::create([
                'name' => $perm
            ]);
        }

    }
}
