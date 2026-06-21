<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectProgressSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('project_progress')->truncate();

        $progresses = [
            // 1. Glow Serum (SR-GS-001)
            [
                'product_batch_number' => 'SR-GS-001',
                'stage' => 'Serum Production',
                'progress_percent' => 100,
                'status' => 'completed',
                'description' => 'Produksi selesai dan siap dijual.',
                'update_date' => '2026-01-03',
            ],

            // 2. Radiance Moisturizer (MS-RM-001)
            [
                'product_batch_number' => 'MS-RM-001',
                'stage' => 'Moisturizer Production',
                'progress_percent' => 100,
                'status' => 'completed',
                'description' => 'Batch siap dipasarkan.',
                'update_date' => '2026-01-05',
            ],

            // 3. Face Cleanser (CL-FC-001)
            [
                'product_batch_number' => 'CL-FC-001',
                'stage' => 'Cleanser Production',
                'progress_percent' => 100,
                'status' => 'completed',
                'description' => 'Produksi selesai.',
                'update_date' => '2026-01-08',
            ],

            // 4. Hydrating Toner (TN-HT-001)
            [
                'product_batch_number' => 'TN-HT-001',
                'stage' => 'Toner Production',
                'progress_percent' => 100,
                'status' => 'completed',
                'description' => 'Ready stock.',
                'update_date' => '2026-01-10',
            ],

            // 5. Night Cream (NC-NMC-001)
            [
                'product_batch_number' => 'NC-NMC-001',
                'stage' => 'Moisturizer Production',
                'progress_percent' => 100,
                'status' => 'completed',
                'description' => 'Produksi selesai.',
                'update_date' => '2026-01-12',
            ],

            // 6. Kanola Glow Hydra Serum (SR-KGHS-002)
            [
                'product_batch_number' => 'SR-KGHS-002',
                'stage' => 'Serum Production',
                'progress_percent' => 80,
                'status' => 'on_progress',
                'description' => 'Tahap quality control.',
                'update_date' => '2026-01-14',
            ],

            // 7. Kanola Brightening Facial Wash (FW-KBFW-002)
            [
                'product_batch_number' => 'FW-KBFW-002',
                'stage' => 'Facial Wash Production',
                'progress_percent' => 90,
                'status' => 'on_progress',
                'description' => 'Tahap packaging akhir.',
                'update_date' => '2026-01-16',
            ],

            // 8. Kanola Acne Clear Gel (TM-KACG-001)
            [
                'product_batch_number' => 'TM-KACG-001',
                'stage' => 'Treatment Production',
                'progress_percent' => 30,
                'status' => 'on_progress',
                'description' => 'Masih tahap formulasi laboratorium.',
                'update_date' => '2026-01-18',
            ],

            // 9. Kanola UV Shield Sunscreen (SS-KUVSS-001)
            [
                'product_batch_number' => 'SS-KUVSS-001',
                'stage' => 'Sunscreen Production',
                'progress_percent' => 65,
                'status' => 'on_progress',
                'description' => 'Sedang proses pengemasan ke dalam tube.',
                'update_date' => '2026-01-20',
            ],

            // 10. Kanola Deep Moisture Cream (MS-KDMC-001)
            [
                'product_batch_number' => 'MS-KDMC-001',
                'stage' => 'Moisturizer Production',
                'progress_percent' => 75,
                'status' => 'on_progress',
                'description' => 'Tahap final testing stabilitas krim.',
                'update_date' => '2026-01-22',
            ],

            // 11. Kanola Gentle Exfoliating Toner (TN-KGET-001)
            [
                'product_batch_number' => 'TN-KGET-001',
                'stage' => 'Toner Production',
                'progress_percent' => 40,
                'status' => 'on_progress',
                'description' => 'Menunggu hasil pengujian laboratorium.',
                'update_date' => '2026-01-24',
            ],

            // 12. Kanola Repair Night Cream (NC-KRNC-001)
            [
                'product_batch_number' => 'NC-KRNC-001',
                'stage' => 'Moisturizer Production',
                'progress_percent' => 50,
                'status' => 'on_progress',
                'description' => 'Masih dalam proses pencampuran bahan aktif.',
                'update_date' => '2026-01-26',
            ],

            // 13. Kanola Soothing Aloe Mist (FM-KSAM-001)
            [
                'product_batch_number' => 'FM-KSAM-001',
                'stage' => 'Face Mist Production',
                'progress_percent' => 0,
                'status' => 'not_started',
                'description' => 'Belum memasuki tahap produksi massal.',
                'update_date' => '2026-01-28',
            ],

            // 14. Kanola Lip Care Nourishing Balm (LP-KLCNB-001)
            [
                'product_batch_number' => 'LP-KLCNB-001',
                'stage' => 'Lip Care Production',
                'progress_percent' => 0,
                'status' => 'not_started',
                'description' => 'Antrean produksi setelah batch lip care sebelumnya selesai.',
                'update_date' => '2026-01-30',
            ],
        ];
        
        foreach ($progresses as $progress) {
            DB::table('project_progress')->insert([
                'code'             => $progress['product_batch_number'], 
                'stage'            => $progress['stage'],
                'progress_percent' => $progress['progress_percent'],
                'status'           => $progress['status'],
                'description'      => $progress['description'],
                'update_date'      => $progress['update_date'],
                'created_at'       => now(),
                'updated_at'       => now(),
            ]);
        }
    }
}