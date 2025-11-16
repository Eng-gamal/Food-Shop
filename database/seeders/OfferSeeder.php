<?php

namespace Database\Seeders;

use App\Models\Offer;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            ['title' => 'Pizza Margherita', 'image' => '1.jpg', 'price' => 100],
            ['title' => 'Cheese Burger', 'image' => '2.jpg', 'price' => 80],
            ['title' => 'Fresh Juice', 'image' => '3.jpg', 'price' => 50],
        ];

        foreach ($products as $data) {
            $product = Product::create([
                'title' => $data['title'],
                'price' => $data['price'],
            ]);

            // لكل منتج نضيف عرض خصم
            Offer::create([
                'product_id' => $product->id,
                'discount' => rand(10, 40), // نسبة عشوائية من 10% لـ 40%
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->addDays(7), // العرض لمدة أسبوع
            ]);
        }

    }
}
