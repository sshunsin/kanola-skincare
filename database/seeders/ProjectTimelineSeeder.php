<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectTimelineSeeder extends Seeder
{
    public function run()
    {
        DB::table('project_timelines')->truncate();

        $timelines = [
            // ----- 1. GLOW SERUM (SR-GS-001) -----
            ['code' => 'BP-1-SR-GS-001', 'title' => 'Mulai Produksi', 'start_date' => '2026-01-01', 'end_date' => '2026-01-02', 'notes' => 'Produksi batch SR-GS-001 dimulai. Semangat! 💪', 'status' => 'planning'],
            ['code' => 'BP-2-SR-GS-001', 'title' => 'Cek Kualitas', 'start_date' => '2026-01-03', 'end_date' => '2026-01-03', 'notes' => 'Quality check batch SR-GS-001. Pastikan formula mencerahkan bekerja maksimal ✨', 'status' => 'planning'],
            ['code' => 'BP-3-SR-GS-001', 'title' => 'Packaging Gemas', 'start_date' => '2026-01-04', 'end_date' => '2026-01-04', 'notes' => 'Packaging batch SR-GS-001. Botol serum dipastikan rapat 💗', 'status' => 'planning'],
            ['code' => 'BP-4-SR-GS-001', 'title' => 'Siap Distribusi', 'start_date' => '2026-01-05', 'end_date' => '2026-01-05', 'notes' => 'Batch SR-GS-001 siap dikirim ke toko. Semoga laris manis! 💸', 'status' => 'planning'],

            // ----- 2. RADIANCE MOISTURIZER (MS-RM-001) -----
            ['code' => 'BP-1-MS-RM-001', 'title' => 'Mulai Produksi', 'start_date' => '2026-01-06', 'end_date' => '2026-01-07', 'notes' => 'Produksi batch MS-RM-001 dimulai. Jangan lupa senyum 😁', 'status' => 'planning'],
            ['code' => 'BP-2-MS-RM-001', 'title' => 'Cek Kualitas', 'start_date' => '2026-01-08', 'end_date' => '2026-01-08', 'notes' => 'Quality check batch MS-RM-001. Pastikan tekstur krim lembut 🌸', 'status' => 'planning'],
            ['code' => 'BP-3-MS-RM-001', 'title' => 'Packaging Gemas', 'start_date' => '2026-01-09', 'end_date' => '2026-01-09', 'notes' => 'Packaging batch MS-RM-001. Wadah jar disegel rapi 🎀', 'status' => 'planning'],
            ['code' => 'BP-4-MS-RM-001', 'title' => 'Siap Distribusi', 'start_date' => '2026-01-10', 'end_date' => '2026-01-10', 'notes' => 'Batch MS-RM-001 siap dikirim. Semoga laku keras! 💰', 'status' => 'planning'],

            // ----- 3. FACE CLEANSER (CL-FC-001) -----
            ['code' => 'BP-1-CL-FC-001', 'title' => 'Mulai Produksi', 'start_date' => '2026-01-11', 'end_date' => '2026-01-12', 'notes' => 'Produksi batch CL-FC-001 dimulai. Fokus pada kualitas ✨', 'status' => 'planning'],
            ['code' => 'BP-2-CL-FC-001', 'title' => 'Cek Kualitas', 'start_date' => '2026-01-13', 'end_date' => '2026-01-13', 'notes' => 'Quality check batch CL-FC-001. Harus bersih dan steril 🧴', 'status' => 'planning'],
            ['code' => 'BP-3-CL-FC-001', 'title' => 'Packaging Gemas', 'start_date' => '2026-01-14', 'end_date' => '2026-01-14', 'notes' => 'Packaging batch CL-FC-001. Cetakan label harus presisi 💖', 'status' => 'planning'],
            ['code' => 'BP-4-CL-FC-001', 'title' => 'Siap Distribusi', 'start_date' => '2026-01-15', 'end_date' => '2026-01-15', 'notes' => 'Batch CL-FC-001 siap dikirim. Customer senang 😊', 'status' => 'planning'],

            // ----- 4. HYDRATING TONER (TN-HT-001) -----
            ['code' => 'BP-1-TN-HT-001', 'title' => 'Mulai Produksi', 'start_date' => '2026-01-16', 'end_date' => '2026-01-17', 'notes' => 'Produksi batch TN-HT-001 dimulai. Jaga konsistensi formula 😎', 'status' => 'planning'],
            ['code' => 'BP-2-TN-HT-001', 'title' => 'Cek Kualitas', 'start_date' => '2026-01-18', 'end_date' => '2026-01-18', 'notes' => 'Quality check batch TN-HT-001. Tingkat hidrasi cairan oke 💦', 'status' => 'planning'],
            ['code' => 'BP-3-TN-HT-001', 'title' => 'Packaging Gemas', 'start_date' => '2026-01-19', 'end_date' => '2026-01-19', 'notes' => 'Packaging batch TN-HT-001. Botol spray berfungsi normal 🎀', 'status' => 'planning'],
            ['code' => 'BP-4-TN-HT-001', 'title' => 'Siap Distribusi', 'start_date' => '2026-01-20', 'end_date' => '2026-01-20', 'notes' => 'Batch TN-HT-001 siap dikirim. Semoga customer bahagia 💖', 'status' => 'planning'],

            // ----- 5. NIGHT CREAM (NC-NMC-001) -----
            ['code' => 'BP-1-NC-NMC-001', 'title' => 'Mulai Produksi', 'start_date' => '2026-01-21', 'end_date' => '2026-01-22', 'notes' => 'Produksi batch NC-NMC-001 dimulai. Proteksi maksimal! 🕶️', 'status' => 'planning'],
            ['code' => 'BP-2-NC-NMC-001', 'title' => 'Cek Kualitas', 'start_date' => '2026-01-23', 'end_date' => '2026-01-23', 'notes' => 'Quality check batch NC-NMC-001. Kandungan aktif teruji aman ☀️', 'status' => 'planning'],
            ['code' => 'BP-3-NC-NMC-001', 'title' => 'Packaging Gemas', 'start_date' => '2026-01-24', 'end_date' => '2026-01-24', 'notes' => 'Packaging batch NC-NMC-001. Desain kemasan malam yang elegan 🎨', 'status' => 'planning'],
            ['code' => 'BP-4-NC-NMC-001', 'title' => 'Siap Distribusi', 'start_date' => '2026-01-25', 'end_date' => '2026-01-25', 'notes' => 'Batch NC-NMC-001 siap dikirim. Semoga laku keras! 💰', 'status' => 'planning'],

            // ----- 7. KANOLA BRIGHTENING FACIAL WASH (FW-KBFW-002) -----
            ['code' => 'BP-1-FW-KBFW-002', 'title' => 'Mulai Produksi', 'start_date' => '2026-01-26', 'end_date' => '2026-01-27', 'notes' => 'Produksi batch FW-KBFW-002 berjalan lancar.', 'status' => 'planning'],
            ['code' => 'BP-2-FW-KBFW-002', 'title' => 'Cek Kualitas', 'start_date' => '2026-01-28', 'end_date' => '2026-01-28', 'notes' => 'Quality check batch FW-KBFW-002 selesai dilakukan.', 'status' => 'planning'],
            ['code' => 'BP-3-FW-KBFW-002', 'title' => 'Packaging Gemas', 'start_date' => '2026-01-29', 'end_date' => '2026-01-29', 'notes' => 'Packaging tube diselesaikan dengan segel pelindung.', 'status' => 'planning'],
            ['code' => 'BP-4-FW-KBFW-002', 'title' => 'Siap Distribusi', 'start_date' => '2026-01-30', 'end_date' => '2026-01-30', 'notes' => 'Batch FW-KBFW-002 dipindahkan ke gudang penyimpanan.', 'status' => 'planning'],
        ];

        foreach ($timelines as $timeline) {
            DB::table('project_timelines')->insert(array_merge($timeline, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
}