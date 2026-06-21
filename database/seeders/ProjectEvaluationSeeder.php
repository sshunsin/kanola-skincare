<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectEvaluationSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('project_evaluations')->truncate();

        $evaluations = [
            // 1. Glow Serum (SR-GS-001)
            [
                'product_batch_number' => 'SR-GS-001',
                'score' => 95,
                'risk_level' => 'low',
                'quality' => 'excellent',
                'decision' => 'continue',
                'manager_notes' => 'Produk sangat baik dan siap dipasarkan.',
                'employee_notes' => 'Formula serum terasa ringan di kulit.',
                'evaluation_date' => '2026-01-03',
            ],

            // 2. Radiance Moisturizer (MS-RM-001)
            [
                'product_batch_number' => 'MS-RM-001',
                'score' => 85,
                'risk_level' => 'low',
                'quality' => 'good',
                'decision' => 'continue',
                'manager_notes' => 'Kualitas produk sesuai standar.',
                'employee_notes' => 'Kulit terasa lebih lembap.',
                'evaluation_date' => '2026-01-05',
            ],

            // 3. Face Cleanser (CL-FC-001)
            [
                'product_batch_number' => 'CL-FC-001',
                'score' => 92,
                'risk_level' => 'low',
                'quality' => 'excellent',
                'decision' => 'continue',
                'manager_notes' => 'Performa pembersih sangat baik.',
                'employee_notes' => 'Kulit tampak lebih bersih dan segar.',
                'evaluation_date' => '2026-01-08',
            ],

            // 4. Hydrating Toner (TN-HT-001)
            [
                'product_batch_number' => 'TN-HT-001',
                'score' => 80,
                'risk_level' => 'low',
                'quality' => 'good',
                'decision' => 'continue',
                'manager_notes' => 'Produk stabil dan layak dipasarkan.',
                'employee_notes' => 'Memberikan hidrasi yang seimbang.',
                'evaluation_date' => '2026-01-10',
            ],

            // 5. Night Cream (NC-NMC-001)
            [
                'product_batch_number' => 'NC-NMC-001',
                'score' => 88,
                'risk_level' => 'low',
                'quality' => 'good',
                'decision' => 'continue',
                'manager_notes' => 'Produk memenuhi standar.',
                'employee_notes' => 'Kulit terasa lembut di pagi hari.',
                'evaluation_date' => '2026-01-14',
            ],

            // 6. Kanola Glow Hydra Serum (SR-KGHS-002)
            [
                'product_batch_number' => 'SR-KGHS-002',
                'score' => 93,
                'risk_level' => 'low',
                'quality' => 'excellent',
                'decision' => 'continue',
                'manager_notes' => 'Produk unggulan.',
                'employee_notes' => 'Bibir lebih lembap.',
                'evaluation_date' => '2026-01-18',
            ],

            // 7. Kanola Brightening Facial Wash (FW-KBFW-002)
            [
                'product_batch_number' => 'FW-KBFW-002',
                'score' => 87,
                'risk_level' => 'low',
                'quality' => 'good',
                'decision' => 'continue',
                'manager_notes' => 'Layak distribusi.',
                'employee_notes' => 'Membersihkan kotoran dengan baik.',
                'evaluation_date' => '2026-01-22',
            ],

            // 8. Kanola Acne Clear Gel (TM-KACG-001)
            [
                'product_batch_number' => 'TM-KACG-001',
                'score' => 78,
                'risk_level' => 'medium',
                'quality' => 'good',
                'decision' => 'revision',
                'manager_notes' => 'Perlu sedikit penyempurnaan formula.',
                'employee_notes' => 'Efek terhadap jerawat cukup baik.',
                'evaluation_date' => '2026-01-24',
            ],

            // 9. Kanola UV Shield Sunscreen (SS-KUVSS-001)
            [
                'product_batch_number' => 'SS-KUVSS-001',
                'score' => 89,
                'risk_level' => 'low',
                'quality' => 'good',
                'decision' => 'continue',
                'manager_notes' => 'Perlindungan UV bekerja stabil.',
                'employee_notes' => 'Tidak meninggalkan whitecast berlebih.',
                'evaluation_date' => '2026-01-26',
            ],

            // 10. Kanola Deep Moisture Cream (MS-KDMC-001)
            [
                'product_batch_number' => 'MS-KDMC-001',
                'score' => 82,
                'risk_level' => 'low',
                'quality' => 'good',
                'decision' => 'continue',
                'manager_notes' => 'Uji kelembapan menunjukkan hasil positif.',
                'employee_notes' => 'Sangat membantu menghidrasi area kering.',
                'evaluation_date' => '2026-01-28',
            ],

            // 11. Kanola Gentle Exfoliating Toner (TN-KGET-001)
            [
                'product_batch_number' => 'TN-KGET-001',
                'score' => 74,
                'risk_level' => 'medium',
                'quality' => 'fair',
                'decision' => 'revision',
                'manager_notes' => 'Kandungan eksfoliasi perlu dievaluasi ulang.',
                'employee_notes' => 'Sedikit memicu reaksi kemerahan pada kulit sensitif.',
                'evaluation_date' => '2026-01-30',
            ],

            // 12. Kanola Repair Night Cream (NC-KRNC-001)
            [
                'product_batch_number' => 'NC-KRNC-001',
                'score' => 86,
                'risk_level' => 'low',
                'quality' => 'good',
                'decision' => 'continue',
                'manager_notes' => 'Lolos uji coba tahap awal.',
                'employee_notes' => 'Tekstur krim malam cukup nyaman digunakan.',
                'evaluation_date' => '2026-02-01',
            ],

            // 13. Kanola Soothing Aloe Mist (FM-KSAM-001)
            [
                'product_batch_number' => 'FM-KSAM-001',
                'score' => 70,
                'risk_level' => 'medium',
                'quality' => 'fair',
                'decision' => 'revision',
                'manager_notes' => 'Mekanisme spray kemasan sering macet.',
                'employee_notes' => 'Partikel mist yang keluar kurang halus.',
                'evaluation_date' => '2026-02-03',
            ],

            // 14. Kanola Lip Care Nourishing Balm (LP-KLCNB-001)
            [
                'product_batch_number' => 'LP-KLCNB-001',
                'score' => 91,
                'risk_level' => 'low',
                'quality' => 'excellent',
                'decision' => 'continue',
                'manager_notes' => 'Formulasi sangat baik dan melembapkan bibir secara instan.',
                'employee_notes' => 'Aroma cherry segar dan tidak lengket.',
                'evaluation_date' => '2026-02-05',
            ],
        ];

        foreach ($evaluations as $evaluation) {
            DB::table('project_evaluations')->insert([
                'code'            => $evaluation['product_batch_number'],
                'score'           => $evaluation['score'],
                'risk_level'      => $evaluation['risk_level'],
                'quality'         => $evaluation['quality'],
                'decision'        => $evaluation['decision'],
                'manager_notes'   => $evaluation['manager_notes'],
                'employee_notes'  => $evaluation['employee_notes'],
                'evaluation_date' => $evaluation['evaluation_date'],
                'created_at'      => now(),
                'updated_at'      => now(),
            ]);
        }
    }
}