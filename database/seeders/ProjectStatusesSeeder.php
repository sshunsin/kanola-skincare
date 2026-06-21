<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectStatusesSeeder extends Seeder
{
    public function run(): void
    {
        $statuses = [
        [
            'product_batch_number' => 'SR-GS-001',
            'name' => 'Active',
            'description' => 'Glow Serum tersedia dan aktif dijual.',
            'is_active' => 1,
        ],
        [
            'product_batch_number' => 'MS-RM-001',
            'name' => 'Active',
            'description' => 'Radiance Moisturizer tersedia dan aktif dijual.',
            'is_active' => 1,
        ],
        [
            'product_batch_number' => 'CL-FC-001',
            'name' => 'Active',
            'description' => 'Face Cleanser tersedia dan aktif dijual.',
            'is_active' => 1,
        ],
        [
            'product_batch_number' => 'TN-HT-001',
            'name' => 'Active',
            'description' => 'Hydrating Toner tersedia dan aktif dijual.',
            'is_active' => 1,
        ],
        [
            'product_batch_number' => 'NC-NMC-001',
            'name' => 'Active',
            'description' => 'Night Cream tersedia dan aktif dijual.',
            'is_active' => 1,
        ],
        [
            'product_batch_number' => 'SR-KGHS-002',
            'name' => 'Active',
            'description' => 'Kanola Glow Hydra Serum tersedia dan aktif dijual.',
            'is_active' => 1,
        ],
        [
            'product_batch_number' => 'FW-KBFW-002',
            'name' => 'Active',
            'description' => 'Kanola Brightening Facial Wash tersedia dan aktif dijual.',
            'is_active' => 1,
        ],
        [
            'product_batch_number' => 'TM-KACG-001',
            'name' => 'Active',
            'description' => 'Kanola Acne Clear Gel tersedia dan aktif dijual.',
            'is_active' => 1,
        ],
        [
            'product_batch_number' => 'SS-KUVSS-001',
            'name' => 'Active',
            'description' => 'Kanola UV Shield Sunscreen tersedia dan aktif dijual.',
            'is_active' => 1,
        ],
        [
            'product_batch_number' => 'MS-KDMC-001',
            'name' => 'Active',
            'description' => 'Kanola Deep Moisture Cream tersedia dan aktif dijual.',
            'is_active' => 1,
        ],
        [
            'product_batch_number' => 'TN-KGET-001',
            'name' => 'Active',
            'description' => 'Kanola Gentle Exfoliating Toner tersedia dan aktif dijual.',
            'is_active' => 1,
        ],
        [
            'product_batch_number' => 'NC-KRNC-001',
            'name' => 'Active',
            'description' => 'Kanola Repair Night Cream tersedia dan aktif dijual.',
            'is_active' => 1,
        ],
        [
            'product_batch_number' => 'FM-KSAM-001',
            'name' => 'Active',
            'description' => 'Kanola Soothing Aloe Mist tersedia dan aktif dijual.',
            'is_active' => 1,
        ],
        [
            'product_batch_number' => 'LP-KLCNB-001',
            'name' => 'Active',
            'description' => 'Kanola Lip Care Nourishing Balm tersedia dan aktif dijual.',
            'is_active' => 1,
        ],
    ];

        foreach ($statuses as $status) {
            DB::table('project_statuses')->insert([
                'code'        => $status['product_batch_number'], 
                'name'        => $status['name'],
                'description' => $status['description'],
                'is_active'   => $status['is_active'],
                'created_at'  => now(),
                'updated_at'  => now(),
            ]);
        }
    }
}