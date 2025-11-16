<?php

namespace Database\Seeders;

use App\Models\Offer;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $images = ['1.jpg', '2.jpg', '3.jpg', '4.jpg', '5.jpg', '6.jpg', '7.jpg', '8.jpg', '9.jpg'];
        $ar_titles = ['برتقال', 'عنب', 'برتقال', 'عنب', 'موز', 'كيوي', 'فراولة', 'كرز', 'موز'];
        $en_titles = ['Oranges', 'Grapes', ' Oranges', 'Grapes', 'Bananas', 'Kiwi', 'Strawberries', 'Cherries', 'Bananas'];
        $ar_price = ['20', '30', '40', '50', '60', '70', '80', '90', '10'];
        $ar_descriptions = [
            ' ويميل هذا النوع من الأطعمة إلى احتوائه على نسبة عالية من السكر والدهون غير الصحية والكربوهيدرات البسيطة.',
            ' قطعة هامبرغر صغيرة، يبلغ عرضها عادةً حوالي 5 سم، مصنوعة من خبز أو لفافة عشاء. يمكن تقديم الساندويتش كمقبلات أو وجبات خفيفة أو أطباق رئيسية.',
            'قطعة هامبرغر صغيرة، يبلغ عرضها عادةً حوالي 5 سم، مصنوعة من خبز أو لفافة عشاء. يمكن تقديم الساندويتش كمقبلات أو وجبات خفيفة أو أطباق رئيسية .',
            ' ويميل هذا النوع من الأطعمة إلى احتوائه على نسبة عالية من السكر والدهون غير الصحية والكربوهيدرات البسيطة.',
            ' قطعة هامبرغر صغيرة، يبلغ عرضها عادةً حوالي 5 سم، مصنوعة من خبز أو لفافة عشاء. يمكن تقديم الساندويتش كمقبلات أو وجبات خفيفة أو أطباق رئيسية.',
            'قطعة هامبرغر صغيرة، يبلغ عرضها عادةً حوالي 5 سم، مصنوعة من خبز أو لفافة عشاء. يمكن تقديم الساندويتش كمقبلات أو وجبات خفيفة أو أطباق رئيسية .',
            ' ويميل هذا النوع من الأطعمة إلى احتوائه على نسبة عالية من السكر والدهون غير الصحية والكربوهيدرات البسيطة.',
            ' قطعة هامبرغر صغيرة، يبلغ عرضها عادةً حوالي 5 سم، مصنوعة من خبز أو لفافة عشاء. يمكن تقديم الساندويتش كمقبلات أو وجبات خفيفة أو أطباق رئيسية.',
            'قطعة هامبرغر صغيرة، يبلغ عرضها عادةً حوالي 5 سم، مصنوعة من خبز أو لفافة عشاء. يمكن تقديم الساندويتش كمقبلات أو وجبات خفيفة أو أطباق رئيسية .',
        ];
        $en_descriptions = [
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit.tellus lacus faucibus lectus, ',
            'This is Photoshops version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet',
            'This is Photoshops version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet.',
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit.tellus lacus faucibus lectus, ',
            'This is Photoshops version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet',
            'This is Photoshops version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet.',
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit.tellus lacus faucibus lectus, ',
            'This is Photoshops version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet',
            'This is Photoshops version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet.',
        ];
        $en_price = ['20', '30', '40', '50', '60', '70', '80', '90', '10'];

        for ($s = 0; $s < count($ar_titles); $s++) {
            $slider = Product::create([
                'ar' => [
                    'title' => $ar_titles[$s],
                    'description' => $ar_descriptions[$s],
                    'price' => $ar_price[$s],
                ],
                'en' => [
                    'title' => $en_titles[$s],
                    'description' => $en_descriptions[$s],
                    'price' => $en_price[$s],
                ],
                'status' => 1
            ]);
            $slider->file()->create([
                'path' => 'images/products/' . $images[$s],
                'type' => 'image'
            ]);
            Offer::create([
                'product_id' => $slider->id,
                'discount' => rand(10, 40),
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->addDays(7),
            ]);
        }
    }
}
