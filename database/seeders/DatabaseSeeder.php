<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ProductSeeder::class,
            DivisionsSeeder::class,
            EmployeeSeeder::class,
            ProductCategorySeeder::class,
            ProjectStatusesSeeder::class,
            ProjectProgressSeeder::class,
            ProjectTimelineSeeder::class,
            ProjectEvaluationSeeder::class,
            UserSeeder::class,
            AttendanceSeeder::class,
            OrdersSeeder::class,
        ]);
    }
}