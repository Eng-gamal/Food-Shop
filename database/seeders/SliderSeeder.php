<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    public function run()
    {
        $images = ['1.jpg', '2.jpg', '3.jpg'];
        $ar_titles = ['فواكه طبيعية', 'أطعمة طازجة', 'سلع طازجة طبيعية'];
        $en_titles = ['Natural Fruits', 'Fresh Organic Food', ' Natural Fresh Goods'];

        $ar_sub_titles = ['ابق بصحة جيدة مع', 'نقدم لك الفواكه العضوية', 'نحن نهتم بك'];
        $en_sub_titles = ['Stay Healthy With', 'We Deliver Organic Fruits.', '   We care for your'];
        $ar_descriptions = [
            'الأطعمة التي تُهضم بسرعة وسهولة. ويميل هذا النوع من الأطعمة إلى احتوائه على نسبة عالية من السكر والدهون غير الصحية والكربوهيدرات البسيطة.',
            ' قطعة هامبرغر صغيرة، يبلغ عرضها عادةً حوالي 5 سم، مصنوعة من خبز أو لفافة عشاء. يمكن تقديم الساندويتش كمقبلات أو وجبات خفيفة أو أطباق رئيسية.',
            'قطعة هامبرغر صغيرة، يبلغ عرضها عادةً حوالي 5 سم، مصنوعة من خبز أو لفافة عشاء. يمكن تقديم الساندويتش كمقبلات أو وجبات خفيفة أو أطباق رئيسية .'
        ];
        $en_descriptions = [
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit.tellus lacus faucibus lectus, sed cursused eros ligula non odio.',
            'This is Photoshops version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet',
            'This is Photoshops version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet.'
        ];

        for ($s = 0; $s < count($ar_titles); $s++) {
            $slider = Slider::create([
                'ar' => [
                    'title' => $ar_titles[$s],
                    'sub_title' => $ar_sub_titles[$s],
                    'description' => $ar_descriptions[$s]
                ],
                'en' => [
                    'title' => $en_titles[$s],
                    'sub_title' => $en_sub_titles[$s],
                    'description' => $en_descriptions[$s]
                ],
                'status' => 1
            ]);
            $slider->file()->create([
                'path' => 'images/sliders/' . $images[$s],
                'type' => 'image'
            ]);
        }
    }
}
