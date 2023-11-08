<?php

namespace Database\Seeders;

use App\Models\AccessGroupModel;
use App\Models\AccessGroupPermissionAssocModel;
use App\Models\PermissionModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccessGroupPermissionAssocSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $proprietario = AccessGroupModel::where("name", "Proprietário(a)")->first();
        $perm_proprietario = PermissionModel::where("name", "perm_*")->first();

        $personal = AccessGroupModel::where("name", "Personal")->first();
        $perm1_personal = PermissionModel::where("name", "perm_insert_workout_routines")->first();
        $perm2_personal = PermissionModel::where("name", "perm_update_workout_routines")->first();
        $perm3_personal = PermissionModel::where("name", "perm_delete_workout_routines")->first();
        $perm4_personal = PermissionModel::where("name", "perm_select_workout_routines")->first();
    
        // Proprietário
        AccessGroupPermissionAssocModel::create([
            'id_access_group' => $proprietario->id,
            'id_permission' => $perm_proprietario->id,
        ]);

        // Personal
        AccessGroupPermissionAssocModel::create([
            'id_access_group' => $personal->id,
            'id_permission' => $perm1_personal->id,
        ]);
        AccessGroupPermissionAssocModel::create([
            'id_access_group' => $personal->id,
            'id_permission' => $perm2_personal->id,
        ]);
        AccessGroupPermissionAssocModel::create([
            'id_access_group' => $personal->id,
            'id_permission' => $perm3_personal->id,
        ]);
        AccessGroupPermissionAssocModel::create([
            'id_access_group' => $personal->id,
            'id_permission' => $perm4_personal->id,
        ]);
    }
}
