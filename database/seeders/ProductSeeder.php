<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::truncate();

        if (!Storage::disk('public')->exists('products')) {
            Storage::disk('public')->makeDirectory('products');
        }

        $sourcePath = public_path('assets/img');
        $destinationPath = storage_path('app/public/products');

        if (File::exists($sourcePath)) {
            $files = File::files($sourcePath);
            foreach ($files as $file) {
                File::copy($file->getPathname(), $destinationPath . '/' . $file->getFilename());
            }
        }

        $products = [
            [
                'name' => 'Glow Serum',
                'batch_number' => 'SR-GS-001',
                'manufactured_at' => '2026-01-15',
                'expired_at' => '2028-01-15',
                'stock' => 100,
                'price' => 149000,
                'status' => 'active',
                'benefits' => 'Mencerahkan kulit, menyamarkan noda hitam, dan menjaga kelembapan wajah.',
                'ingredients' => 'Vitamin C, Niacinamide',
                'how_to_use' => 'Gunakan beberapa tetes sebelum pelembap.',
                'image' => 'WhatsApp Image 2025-06-17 at 14.16.36_e89362aa.jpg',
                'categories_id' => 3,
            ],
            [
                'name' => 'Radiance Moisturizer',
                'batch_number' => 'MS-RM-001',
                'manufactured_at' => '2026-01-15',
                'expired_at' => '2028-01-15',
                'stock' => 120,
                'price' => 189000,
                'status' => 'active',
                'benefits' => 'Mengunci kelembapan intensif dan memperkuat lapisan skin barrier.',
                'ingredients' => 'Ceramide, Hyaluronic Acid',
                'how_to_use' => 'Oleskan merata pada wajah bersih.',
                'image' => 'WhatsApp Image 2025-06-17 at 08.59.37_b2adab46.jpg',
                'categories_id' => 4,
            ],
            [
                'name' => 'Face Cleanser',
                'batch_number' => 'CL-FC-001',
                'manufactured_at' => '2026-01-15',
                'expired_at' => '2028-01-15',
                'stock' => 150,
                'price' => 99000,
                'status' => 'active',
                'benefits' => 'Membersihkan wajah secara mendalam tanpa membuat kulit terasa kering.',
                'ingredients' => 'Aloe Vera, Chamomile Extract',
                'how_to_use' => 'Busakan dengan air dan bilas hingga bersih.',
                'image' => 'WhatsApp Image 2025-06-17 at 03.33.50_a879fc5f.jpg',
                'categories_id' => 6,
            ],
            [
                'name' => 'Hydrating Toner',
                'batch_number' => 'TN-HT-001',
                'manufactured_at' => '2026-01-15',
                'expired_at' => '2028-01-15',
                'stock' => 130,
                'price' => 129000,
                'status' => 'active',
                'benefits' => 'Menyeimbangkan pH alami kulit sekaligus memberikan hidrasi ekstra.',
                'ingredients' => 'Hyaluronic Acid, Centella Asiatica',
                'how_to_use' => 'Tuangkan pada telapak tangan atau kapas lalu tepuk lembut.',
                'image' => 'hydra-mist.jpg',
                'categories_id' => 2,
            ],
            [
                'name' => 'Night Cream',
                'batch_number' => 'NC-NMC-001',
                'manufactured_at' => '2026-01-15',
                'expired_at' => '2028-01-15',
                'stock' => 90,
                'price' => 219000,
                'status' => 'active',
                'benefits' => 'Nutrisi malam hari untuk membantu proses regenerasi sel kulit saat tidur.',
                'ingredients' => 'Retinol, Peptide',
                'how_to_use' => 'Gunakan secara tipis merata pada malam hari.',
                'image' => 'tone-up.jpeg',
                'categories_id' => 4,
            ],
            [
                'name' => 'Kanola Glow Hydra Serum',
                'batch_number' => 'SR-KGHS-002',
                'manufactured_at' => '2026-01-15',
                'expired_at' => '2028-01-15',
                'stock' => 10,
                'price' => 149000,
                'status' => 'active',
                'benefits' => 'Mencerahkan dan memberikan hidrasi mendalam.',
                'ingredients' => 'Niacinamide, Hyaluronic Acid',
                'how_to_use' => 'Gunakan 2-3 tetes pada wajah bersih.',
                'image' => 'WhatsApp Image 2025-06-17 at 14.16.36_e89362aa.jpg',
                'categories_id' => 3,
            ],
            [
                'name' => 'Kanola Brightening Facial Wash',
                'batch_number' => 'FW-KBFW-002',
                'manufactured_at' => '2026-01-15',
                'expired_at' => '2028-01-15',
                'stock' => 15,
                'price' => 99000,
                'status' => 'active',
                'benefits' => 'Membersihkan debu kotoran dan mencerahkan.',
                'ingredients' => 'Vitamin C, Aloe Vera',
                'how_to_use' => 'Busakan dengan air lalu pijat lembut wajah.',
                'image' => 'WhatsApp Image 2025-06-17 at 14.19.34_ce5cf8b1.jpg',
                'categories_id' => 1,
            ],
            [
                'name' => 'Kanola Acne Clear Gel',
                'batch_number' => 'TM-KACG-001',
                'manufactured_at' => '2026-01-15',
                'expired_at' => '2028-01-15',
                'stock' => 5,
                'price' => 89000,
                'status' => 'active',
                'benefits' => 'Membantu meredakan jerawat aktif kemerahan.',
                'ingredients' => 'Salicylic Acid, Tea Tree',
                'how_to_use' => 'Oleskan tipis pada bagian yang berjerawat.',
                'image' => 'beauty campaign for Kylie Skin _ Skincare products….jpeg',
                'categories_id' => 11,
            ],
            [
                'name' => 'Kanola UV Shield Sunscreen',
                'batch_number' => 'SS-KUVSS-001',
                'manufactured_at' => '2026-01-15',
                'expired_at' => '2028-01-15',
                'stock' => 20,
                'price' => 149000,
                'status' => 'active',
                'benefits' => 'Melindungi kulit dari paparan sinar UV matahari.',
                'ingredients' => 'SPF 50 PA++++, Ceramide',
                'how_to_use' => 'Oleskan dua ruas jari sebelum beraktivitas.',
                'image' => 'download.jpeg',
                'categories_id' => 5,
            ],
            [
                'name' => 'Kanola Deep Moisture Cream',
                'batch_number' => 'MS-KDMC-001',
                'manufactured_at' => '2026-01-15',
                'expired_at' => '2028-01-15',
                'stock' => 12,
                'price' => 135000,
                'status' => 'active',
                'benefits' => 'Menutrisi kulit kering memberikan kelembapan intens.',
                'ingredients' => 'Shea Butter, Ceramide',
                'how_to_use' => 'Gunakan merata ke seluruh wajah dan leher.',
                'image' => 'tone-up.jpeg',
                'categories_id' => 4,
            ],
            [
                'name' => 'Kanola Gentle Exfoliating Toner',
                'batch_number' => 'TN-KGET-001',
                'manufactured_at' => '2026-01-15',
                'expired_at' => '2028-01-15',
                'stock' => 8,
                'price' => 119000,
                'status' => 'active',
                'benefits' => 'Mengangkat sel kulit mati dan menghaluskan tekstur.',
                'ingredients' => 'AHA, BHA, PHA',
                'how_to_use' => 'Tuang pada kapas lalu usap lembut ke wajah.',
                'image' => 'Alya Skin ™ on Instagram_ “Time to detoxify….jpeg',
                'categories_id' => 2,
            ],
            [
                'name' => 'Kanola Repair Night Cream',
                'batch_number' => 'NC-KRNC-001',
                'manufactured_at' => '2026-01-15',
                'expired_at' => '2028-01-15',
                'stock' => 7,
                'price' => 155000,
                'status' => 'active',
                'benefits' => 'Mendukung regenerasi sel kulit pada malam hari.',
                'ingredients' => 'Retinol, Peptide',
                'how_to_use' => 'Gunakan secara tipis pada malam hari.',
                'image' => 'hydra-mist.jpg',
                'categories_id' => 4,
            ],
            [
                'name' => 'Kanola Soothing Aloe Mist',
                'batch_number' => 'FM-KSAM-001',
                'manufactured_at' => '2026-01-15',
                'expired_at' => '2028-01-15',
                'stock' => 14,
                'price' => 99000,
                'status' => 'active',
                'benefits' => 'Menyegarkan sekaligus menenangkan kulit iritasi.',
                'ingredients' => 'Aloe Vera Extract',
                'how_to_use' => 'Semprotkan dari jarak 15cm kapan pun dibutuhkan.',
                'image' => 'WhatsApp Image 2025-06-17 at 03.33.50_a879fc5f.jpg',
                'categories_id' => 10,
            ],
            [
                'name' => 'Kanola Lip Care Nourishing Balm',
                'batch_number' => 'LP-KLCNB-001',
                'manufactured_at' => '2026-01-15',
                'expired_at' => '2028-01-15',
                'stock' => 30,
                'price' => 69000,
                'status' => 'active',
                'benefits' => 'Mengatasi bibir pecah-pecah kusam agar lembap.',
                'ingredients' => 'Vitamin E, Jojoba Oil',
                'how_to_use' => 'Oleskan merata pada permukaan bibir.',
                'image' => 'WhatsApp Image 2025-06-17 at 08.59.37_b2adab46.jpg',
                'categories_id' => 8,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}