<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AttendanceSeeder extends Seeder
{
    public function run()
    {
        $employees = [
            'Andi Pratama',
            'Raka Putra',
            'Nabila Aisyah',
            'Fajar Nugroho',
            'Kevin Wijaya',
            'Dedi Firmansyah',
            'Rizky Hidayat',
            'Lina Aulia',
            'Putri Maharani',
            'Maya Putri',
            'Ahmad Fauzan',
            'Siti Rahma',
            'Rani Oktaviani',
            'Arif Nugroho',
            'Deni Saputra',
            'Zahra Amalia',
            'Alya Putri',
            'Toni Wijaya',
            'Bagus Prasetyo',
            'Rina Lestari',
            'Agus Setiawan'
        ];

        $statuses = ['hadir', 'izin', 'alpha'];
        $notesPool = [
            'Datang tepat waktu',
            'Telat 15 menit',
            'Izin sakit',
            'Izin urusan keluarga',
            'Absen tanpa kabar',
            'Pulang lebih awal',
            'Remote working',
            'Meeting di luar kantor'
        ];

        $startDate = Carbon::now()->subDays(10);
        $endDate = Carbon::now();

        foreach ($employees as $employee) {
            $date = clone $startDate;
            while ($date <= $endDate) {
                $status = $statuses[array_rand($statuses)];

                if ($status == 'hadir') {
                    $check_in = $date->copy()->setTime(rand(7, 9), rand(0, 59));
                    $check_out = $date->copy()->setTime(rand(16, 18), rand(0, 59));
                    $note = $notesPool[array_rand($notesPool)];
                } elseif ($status == 'izin') {
                    $check_in = null;
                    $check_out = null;
                    $note = $notesPool[array_rand($notesPool)];
                } else {
                    $check_in = null;
                    $check_out = null;
                    $note = 'Tidak hadir tanpa kabar';
                }

                DB::table('attendances')->insert([
                    'name' => $employee,
                    'date' => $date->format('Y-m-d'),
                    'check_in' => $check_in ? $check_in->format('H:i:s') : null,
                    'check_out' => $check_out ? $check_out->format('H:i:s') : null,
                    'status' => $status,
                    'notes' => $note,
                ]);

                $date->addDay();
            }
        }
    }
}