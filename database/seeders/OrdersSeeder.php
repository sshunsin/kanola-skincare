<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrdersSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('orders')->truncate();

        $frontendProducts = [
            ['name' => 'Glow Serum', 'price' => 149000, 'image' => 'WhatsApp Image 2025-06-17 at 14.16.36_e89362aa.jpg'],
            ['name' => 'Radiance Moisturizer', 'price' => 189000, 'image' => 'WhatsApp Image 2025-06-17 at 08.59.37_b2adab46.jpg'],
            ['name' => 'Face Cleanser', 'price' => 99000, 'image' => 'WhatsApp Image 2025-06-17 at 03.33.50_a879fc5f.jpg'],
            ['name' => 'Hydrating Toner', 'price' => 129000, 'image' => 'hydra-mist.jpg'],
            ['name' => 'Night Cream', 'price' => 219000, 'image' => 'tone-up.jpeg'],
            ['name' => 'Kanola Glow Hydra Serum', 'price' => 149000, 'image' => 'WhatsApp Image 2025-06-17 at 14.16.36_e89362aa.jpg'],
            ['name' => 'Kanola Brightening Facial Wash', 'price' => 99000, 'image' => 'WhatsApp Image 2025-06-17 at 14.19.34_ce5cf8b1.jpg'],
            ['name' => 'Kanola Acne Clear Gel', 'price' => 89000, 'image' => 'beauty campaign for Kylie Skin _ Skincare products….jpeg'],
            ['name' => 'Kanola UV Shield Sunscreen', 'price' => 149000, 'image' => 'download.jpeg'],
            ['name' => 'Kanola Deep Moisture Cream', 'price' => 135000, 'image' => 'tone-up.jpeg'],
            ['name' => 'Kanola Gentle Exfoliating Toner', 'price' => 119000, 'image' => 'Alya Skin ™ on Instagram_ “Time to detoxify….jpeg'],
            ['name' => 'Kanola Repair Night Cream', 'price' => 155000, 'image' => 'hydra-mist.jpg'],
            ['name' => 'Kanola Soothing Aloe Mist', 'price' => 99000, 'image' => 'WhatsApp Image 2025-06-17 at 03.33.50_a879fc5f.jpg'],
            ['name' => 'Kanola Lip Care Nourishing Balm', 'price' => 69000, 'image' => 'WhatsApp Image 2025-06-17 at 08.59.37_b2adab46.jpg'],
        ];

        $paymentMethods = ['BCA', 'BRI', 'BNI', 'QRIS', 'DANA'];
        $shippingMethods = ['jne', 'jnt', 'sicepat'];
        $customers = [
            'Ahmad Fauzi', 'Siti Rahmawati', 'Dian Pratama', 'Indah Permatasari', 
            'Rian Hidayat', 'Putri Ayu', 'Eko Prasetyo', 'Anisa Fitriani', 
            'Rendra Wijaya', 'Citra Lestari', 'Agus Supriatna', 'Novianti Ramadhani',
            'Ferry Kurniawan', 'Larasati Dewi', 'Taufik Hidayat'
        ];

        $orders = [];
        $totalData = 25; 

        for ($i = 0; $i < $totalData; $i++) {
            $selectedProducts = [];
            $orderTotalPrice = 0;
            $itemCount = rand(1, 3);
            $shuffledProducts = $frontendProducts;
            shuffle($shuffledProducts);

            for ($j = 0; $j < $itemCount; $j++) {
                $product = $shuffledProducts[$j];
                $quantity = rand(1, 2);
                $subTotal = $product['price'] * $quantity;

                $selectedProducts[] = [
                    'name' => $product['name'],
                    'price' => $product['price'],
                    'quantity' => $quantity,
                    'image' => $product['image'],
                    'subtotal' => $subTotal
                ];

                $orderTotalPrice += $subTotal;
            }

            if ($i < count($customers)) {
                $customerName = $customers[$i];
            } else {
                $customerName = $customers[array_rand($customers)];
            }

            $orders[] = [
                'customer_name' => $customerName,
                'payment_method' => $paymentMethods[array_rand($paymentMethods)],
                'shipping_method' => $shippingMethods[array_rand($shippingMethods)],
                'total_price' => $orderTotalPrice,
                'status' => 'completed', 
                'products' => json_encode($selectedProducts),
                'created_at' => now()->subDays(rand(0, 7))->subHours(rand(0, 23)), 
                'updated_at' => now(),
            ];
        }

        DB::table('orders')->insert($orders);
    }
}