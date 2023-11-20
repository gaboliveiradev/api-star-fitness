<?php

namespace Database\Seeders;

use App\Models\AccessGroupModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccessGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*$accessGroup = ['Proprietário(a)', 'Professor'];
        $permissions = [
            'App:*',
            'GymMember:insert',
            'GymMember:update',
            'GymMember:delete',
            'GymMember:select',
            'Employee:insert',
            'Employee:update',
            'Employee:delete',
            'Employee:select',
            'Plan:insert',
            'Plan:update',
            'Plan:delete',
            'Plan:select',
            'Exercise:insert',
            'Exercise:update',
            'Exercise:delete',
            'Exercise:select',
            'WorkoutRoutine:insert',
            'WorkoutRoutine:update',
            'WorkoutRoutine:delete',
            'WorkoutRoutine:select',
        ];*/


        AccessGroupModel::create([
            'name' => 'Proprietário(a)',
            'abilities' => "['App:*']"
        ]);

        AccessGroupModel::create([
            'name' => 'Professor',
            'abilities' => "['WorkoutRoutine:insert','WorkoutRoutine:update','WorkoutRoutine:delete','WorkoutRoutine:select','GymMember:select','Plan:select','Exercise:select']"
        ]);

    }
}
