<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Employee;
use App\Models\Paycheck;
use App\Models\Department;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory([
            'name' => 'Admin User',
            'email' => 'd@me.com',
            'password' => Hash::make('password'),
        ])->create();

        Department::factory(5)
            ->sequence(
                ['name' => 'Development'],
                ['name' => 'Marketing'],
                ['name' => 'Sales'],
                ['name' => 'Finance'],
                ['name' => 'Administration'],
            )
            // ->has(Employee::factory()->count(50)
            //     ->has(Paycheck::factory()->count(12))
            // )
            ->create();
    }
}
