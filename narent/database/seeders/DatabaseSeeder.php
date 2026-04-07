<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'category_id' => 1,
                'category_name' => 'Big Bus 6x2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'category_id' => 2,
                'category_name' => 'Big Bus 4x2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'category_id' => 3,
                'category_name' => 'Medium Bus',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'category_id' => 4,
                'category_name' => 'Mikro Bus',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);

        DB::table('brands')->insert([
            [
                'brand_id' => 1,
                'brand_name' => 'Mercedes-Benz OH 1626 L',
                'brand_manufacture' => 'Mercedes-Benz',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'brand_id' => 2,
                'brand_name' => 'Scania K410IB',
                'brand_manufacture' => 'Scania',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'brand_id' => 3,
                'brand_name' => 'Mercedes-Benz OF 917 L',
                'brand_manufacture' => 'Mercedes-Benz',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'brand_id' => 4,
                'brand_name' => 'Mercedes-Benz OF 917 S',
                'brand_manufacture' => 'Mercedes-Benz',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);

        DB::table('products')->insert([
            [
                'product_id' => 1,
                'category_id' => 1,
                'brand_id' => 2,
                'product_name' => 'Grand Priority Class',
                'product_price' => 6500000,
                'product_stock' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'product_id' => 2,
                'category_id' => 2,
                'brand_id' => 1,
                'product_name' => 'Priority Class',
                'product_price' => 4500000,
                'product_stock' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'product_id' => 3,
                'category_id' => 3,
                'brand_id' => 3,
                'product_name' => 'Pioneer Class',
                'product_price' => 3250000,
                'product_stock' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'product_id' => 4,
                'category_id' => 4,
                'brand_id' => 4,
                'product_name' => 'Trave Class',
                'product_price' => 3000000,
                'product_stock' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }
}
