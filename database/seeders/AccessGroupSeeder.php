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
        $accessGroup = ['Proprietário(a)', 'Professor'];

        foreach($accessGroup as $group) {
            AccessGroupModel::create([
                'name' => $group
            ]);
        }
    }
}
