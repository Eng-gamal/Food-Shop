<?php

namespace Database\Seeders;

use App\Models\Feature;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FeatureSeeder extends Seeder
{

    public function run()
    {
        //features
        $ar_title = [
            ' شحن مجاني',
            'دعم فني',
            'استرداد مجاني',
            'تواصل معنا'

        ];
        $en_title = [
            'FREE SHIPPING',
            'SUPPORT',
            'FREE REFUND',
            'CONTACT US'
        ];
        $ar_description = [
            'على 300 دولار فوق الطلب',
            'على 300 دولار فوق الطلب',
            'على 300 دولار فوق الطلب',
            'على 300 دولار فوق الطلب',
        ];
        $en_description = [
            'ON $300 ABOVE ORDER',
            'ON $300 ABOVE ORDER',
            'ON $300 ABOVE ORDER',
            'ON $300 ABOVE ORDER',

        ];

        $icon = [
            'las la-paper-plane',
            'las la-headset',
            'las la-globe-europe',
            'las la-phone'
        ];

        for ($i = 0; $i < count($ar_title); $i++) {
            $feature = Feature::create([
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
