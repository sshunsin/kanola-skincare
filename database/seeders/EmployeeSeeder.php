<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema; // Tambahkan baris ini
use Carbon\Carbon;

class EmployeeSeeder extends Seeder
{
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        
        DB::table('employees')->truncate();
        
        Schema::enableForeignKeyConstraints();

        $employees = [
            ['name' => 'Andi Pratama', 'division_id' => 1, 'position' => 'IT Manager', 'phone' => '0812-3456-7801', 'status' => 'Active'],
            ['name' => 'Raka Putra', 'division_id' => 1, 'position' => 'Backend Developer', 'phone' => '0812-3456-7802', 'status' => 'Active'],
            ['name' => 'Nabila Aisyah', 'division_id' => 1, 'position' => 'Frontend Developer', 'phone' => '0812-3456-7803', 'status' => 'Active'],
            ['name' => 'Fajar Nugroho', 'division_id' => 2, 'position' => 'Infrastructure Engineer', 'phone' => '0812-3456-7804', 'status' => 'Active'],
            ['name' => 'Kevin Wijaya', 'division_id' => 2, 'position' => 'Network Administrator', 'phone' => '0812-3456-7805', 'status' => 'Active'],
            ['name' => 'Dedi Firmansyah', 'division_id' => 3, 'position' => 'IT Support Lead', 'phone' => '0812-3456-7806', 'status' => 'Active'],
            ['name' => 'Rizky Hidayat', 'division_id' => 3, 'position' => 'Helpdesk Staff', 'phone' => '0812-3456-7807', 'status' => 'Active'],
            ['name' => 'Lina Aulia', 'division_id' => 4, 'position' => 'HR Recruitment Lead', 'phone' => '0812-3456-7808', 'status' => 'Active'],
            ['name' => 'Putri Maharani', 'division_id' => 4, 'position' => 'Recruitment Officer', 'phone' => '0812-3456-7809', 'status' => 'Active'],
            ['name' => 'Maya Putri', 'division_id' => 5, 'position' => 'HR Training Manager', 'phone' => '0812-3456-7810', 'status' => 'Active'],
            ['name' => 'Ahmad Fauzan', 'division_id' => 5, 'position' => 'Training Staff', 'phone' => '0812-3456-7811', 'status' => 'Active'],
            ['name' => 'Siti Rahma', 'division_id' => 6, 'position' => 'Finance Manager', 'phone' => '0812-3456-7812', 'status' => 'Active'],
            ['name' => 'Rani Oktaviani', 'division_id' => 6, 'position' => 'Accounting Staff', 'phone' => '0812-3456-7813', 'status' => 'Active'],
            ['name' => 'Arif Nugroho', 'division_id' => 7, 'position' => 'Budget Analyst', 'phone' => '0812-3456-7814', 'status' => 'Active'],
            ['name' => 'Deni Saputra', 'division_id' => 8, 'position' => 'Digital Marketing Manager', 'phone' => '0812-3456-7815', 'status' => 'Active'],
            ['name' => 'Zahra Amalia', 'division_id' => 8, 'position' => 'Content Specialist', 'phone' => '0812-3456-7816', 'status' => 'Active'],
            ['name' => 'Alya Putri', 'division_id' => 9, 'position' => 'Branding Manager', 'phone' => '0812-3456-7817', 'status' => 'Active'],
            ['name' => 'Toni Wijaya', 'division_id' => 10, 'position' => 'Warehouse Supervisor', 'phone' => '0812-3456-7818', 'status' => 'Active'],
            ['name' => 'Bagus Prasetyo', 'division_id' => 10, 'position' => 'Warehouse Staff', 'phone' => '0812-3456-7819', 'status' => 'Active'],
            ['name' => 'Rina Lestari', 'division_id' => 11, 'position' => 'QC Manager', 'phone' => '0812-3456-7820', 'status' => 'Active'],
            ['name' => 'Agus Setiawan', 'division_id' => 11, 'position' => 'QC Inspector', 'phone' => '0812-3456-7821', 'status' => 'Active'],
        ];

        $today = Carbon::now()->format('Ymd');
        foreach ($employees as $index => $employee) {
            $number = str_pad($index + 1, 2, '0', STR_PAD_LEFT);
            $employee['employee_code'] = "EMPY{$today}{$number}";
            
            DB::table('employees')->insert($employee);
        }
    }
}