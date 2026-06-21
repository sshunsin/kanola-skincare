<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductCategorySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('product_categories')->truncate();

        // Urutan array disusun presisi agar Auto Increment menghasilkan ID 1 sampai 11 sesuai relasi produk
        $categories = [
            'Facial Wash', // ID 1
            'Toner',       // ID 2
            'Serum',       // ID 3
            'Moisturizer', // ID 4
            'Sunscreen',   // ID 5
            'Cleanser',    // ID 6
            'Mask',        // ID 7
            'Lip Care',    // ID 8
            'Eye Care',    // ID 9
            'Face Mist',   // ID 10
            'Treatment',   // ID 11
        ];

        foreach ($categories as $category) {
            DB::table('product_categories')->insert([
                'category_name' => $category,
                'slug' => Str::slug($category),
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}