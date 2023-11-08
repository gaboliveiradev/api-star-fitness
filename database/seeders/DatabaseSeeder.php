<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Http\Controllers\AccessGroupEmployeeAssocController;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            EmployeeSeeder::class,
            GymMemberSeeder::class,
            PermissionSeeder::class,
            AccessGroupSeeder::class,
            AccessGroupPermissionAssocSeeder::class,
            AcessGroupEmployeeAssocSeeder::class,
        ]);
    }
}
