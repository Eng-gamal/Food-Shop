<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //features
        $ar_title = ['من نحن؟', 'كيف نعمل؟', 'ماذا نزرع؟'];
        $en_title = ['Who We Are?', 'How We Do?', 'What We Grow?',];

        $ar_description = [
            'لوريم إيبسوم هو ببساطة نص شكلي (بمعنى آخر) يُستخدم في الطباعة والتنضيد',
            'لوريم إيبسوم هو ببساطة نص شكلي (بمعنى آخر) يُستخدم في الطباعة والتنضيد',
            'لوريم إيبسوم هو ببساطة نص شكلي (بمعنى آخر) يُستخدم في الطباعة والتنضيد',
        ];

        $en_description = [
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
        ];

        $icon = [
            'las la-campground',
            'las la-tractor',
            'las la-seedling',
        ];

        for ($i = 0; $i < count($ar_title); $i++) {
            $about = About::create([
                'ar' => [
                    'title' => $ar_title[$i],
                    'description' => $ar_description[$i],
                ],
                'en' => [
                    'title' => $en_title[$i],
                    'description' => $en_description[$i],
                ],

                'status' => 1,
                'icon' => $icon[$i],

            ]);
        }
    }
}
